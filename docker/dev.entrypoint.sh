#!/bin/sh
# Laravel + Inertia.js — Docker entrypoint (local dev)
set -e

echo "==> Installing Composer dependencies..."
composer install --optimize-autoloader --no-interaction --no-progress --no-ansi

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

echo "==> Waiting for the Vite dev server..."
MAX_RETRIES=60
ATTEMPT=0
until [ -f public/hot ]; do
    ATTEMPT=$((ATTEMPT + 1))
    if [ "$ATTEMPT" -ge "$MAX_RETRIES" ]; then
        echo "WARNING: Vite dev server not ready after ${MAX_RETRIES} attempts. Starting anyway."
        break
    fi
    sleep 2
done

echo "==> Starting Laravel development server..."
exec php artisan serve --host=0.0.0.0 --port=8000
