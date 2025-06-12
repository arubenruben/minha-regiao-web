#!/bin/sh

# This script is used to set up the environment for a Laravel application.
composer dump-autoload --optimize

npm install

# Run npm dev in the background
npm run dev &

php -f artisan serve --host=0.0.0 --port=8000