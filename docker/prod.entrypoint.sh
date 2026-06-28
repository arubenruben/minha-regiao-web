#!/bin/sh
# Laravel + Inertia.js — Docker entrypoint (stage/prod)
# Composer deps and frontend assets are already baked into the image (see
# Dockerfile), so there's nothing to install here — just wait for the
# database, migrate, and serve.
set -e

echo "==> Waiting for the database to be ready..."
MAX_RETRIES=30
ATTEMPT=0
until php artisan migrate --force --no-interaction; do
    ATTEMPT=$((ATTEMPT + 1))
    if [ "$ATTEMPT" -ge "$MAX_RETRIES" ]; then
        echo "ERROR: Database not reachable after ${MAX_RETRIES} attempts. Exiting."
        exit 1
    fi
    echo "    Not ready yet, retrying in 3 s... (${ATTEMPT}/${MAX_RETRIES})"
    sleep 3
done

echo "==> Starting php-fpm..."
php-fpm -D

echo "==> Starting nginx..."
exec nginx -g "daemon off;"
