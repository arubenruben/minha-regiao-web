FROM php:8.4-cli-alpine

RUN apk add --no-cache \
    bash curl zip unzip git libpng-dev libjpeg-turbo-dev freetype-dev \
    oniguruma-dev libxml2-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \

    apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql mbstring gd xml bcmath opcache


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

# Storage/bootstrap dirs are created by the entrypoint at runtime after
# the volume mount is in place. Invoked via `sh` (not directly) because the
# bind mount in docker-compose.yml replaces this file with the host copy at
# runtime, and zip extraction on some platforms (notably Windows) drops the
# executable bit — running it as an argument to `sh` avoids depending on it.
RUN chmod +x entrypoint.sh

EXPOSE 8000
CMD ["sh", "entrypoint.sh"]
