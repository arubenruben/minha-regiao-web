FROM php:8.4-cli

WORKDIR /app

COPY ./install.sh ./

RUN chmod +x ./install.sh

# Install composer v2
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Turn composer into a global command
RUN mv /usr/local/bin/composer /usr/bin/composer

# Install git and other dependencies
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

# Install npm and nodejs
RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs \
    && npm cache clean --force

ENTRYPOINT [ "./install.sh" ]