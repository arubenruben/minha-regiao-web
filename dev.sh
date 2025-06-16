#!/bin/sh

composer install

npm install

# Run npm dev in the background
npm run dev &

php -f artisan serve --host=0.0.0 --port=8000