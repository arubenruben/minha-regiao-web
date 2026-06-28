FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    bash curl zip unzip git nginx libpng-dev libjpeg-turbo-dev freetype-dev \
    oniguruma-dev libxml2-dev nodejs npm && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \

    apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql mbstring gd xml bcmath opcache


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

# Stage/prod serve through nginx + php-fpm (see docker/prod.entrypoint.sh);
# dev still uses `php artisan serve` directly (see docker/dev.entrypoint.sh),
# but the `php` CLI binary ships in this image either way.
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

RUN composer install --no-dev --no-interaction --no-progress --no-ansi --optimize-autoloader

# `wayfinder` (the vite plugin that generates typed routes/actions) boots
# Laravel via `php artisan` and needs a parseable .env + APP_KEY to do so.
# Stage/prod containers get their config from real environment variables at
# runtime (see docker-compose.stage.yml / docker-compose.prod.yml), not from
# a .env file, so this one only exists for the duration of the build.
RUN npm ci && \
    cp .env.example .env && \
    php artisan key:generate --no-interaction --force && \
    npm run build && \
    rm .env && \
    rm -rf node_modules

# Invoked via `sh` (not directly) because the bind mount in docker-compose.yml
# replaces these files with the host copy at runtime, and zip extraction on
# some platforms (notably Windows) drops the executable bit — running it as
# an argument to `sh` avoids depending on it.
#
# `docker/prod.entrypoint.sh` is this image's default: stage/prod run
# unmodified from this image with no bind mount. dev overrides `command:` in
# docker-compose.yml to run `docker/dev.entrypoint.sh` instead (see there for
# why).
RUN chmod +x docker/dev.entrypoint.sh docker/prod.entrypoint.sh

# php-fpm's worker (www-data) needs write access to these for logs, cache and
# session/view compilation.
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
CMD ["sh", "docker/prod.entrypoint.sh"]
