FROM php:8.4-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libonig-dev \
    libcurl4-openssl-dev \
    libssl-dev

# Install common PHP extensions for Laravel.
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    bcmath \
    exif \
    pcntl \
    pdo_mysql \
    gd \
    zip

# Install npm and nodejs
RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs \
    && npm cache clean --force


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Clean up apt cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN usermod -u 1000 www-data

COPY dev.sh .
RUN chmod +x dev.sh

# Install PHP dependencies using Composer
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-scripts --no-autoloader

# Install npm dependencies
COPY package.json ./
RUN npm install --no-audit --no-fund --legacy-peer-deps

RUN git config --global --add safe.directory /var/www/html

COPY --chown=www-data:www-data . .

EXPOSE 8000

ENTRYPOINT [ "./dev.sh" ]