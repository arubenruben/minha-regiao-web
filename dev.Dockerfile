FROM node:24-slim AS node

WORKDIR /app

COPY package.json package-lock.json ./
# Install Node.js dependencies (changes when package.json changes)
RUN npm install --loglevel verbose


FROM php:8.4-fpm

WORKDIR /var/www/html

# Install system dependencies (rarely changes)
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
    libssl-dev \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (rarely changes)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    bcmath \
    exif \
    pcntl \
    pdo_pgsql \
    pgsql \
    gd \
    zip

# Alter memory_limit in php.ini (rarely changes)
RUN { \
    echo 'memory_limit = 512M'; \
    echo 'upload_max_filesize = 100M'; \
    echo 'post_max_size = 100M'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_time = 300'; \
    } > /usr/local/etc/php/conf.d/99-custom.ini

# Install Node.js and npm (rarely changes)
RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs \
    && npm cache clean --force

# Install Composer (rarely changes)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --from=node /app/node_modules /var/www/html/node_modules

# Set up user and permissions (rarely changes)
RUN usermod -u 1000 www-data \
    && chmod -R 755 /var/www/html \
    && chown -R www-data:www-data /var/www/html

# Copy and setup dev script (changes occasionally)
COPY dev.sh .
RUN chmod +x dev.sh

# Install PHP dependencies (changes when composer files change)
COPY composer.json composer.lock ./
# Copy application code (changes frequently - keep last)
COPY --chown=www-data:www-data . .

EXPOSE 8000

ENTRYPOINT [ "./dev.sh" ]