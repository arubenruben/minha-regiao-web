#!/bin/bash
echo "Installing Laravel..."
composer global require laravel/installer

echo "Laravel installer installed globally."
composer create-project laravel/laravel minha-regiao

cd minha-regiao
composer install

echo "Install Inertia.js for Laravel..."
composer require laravel/breeze --dev
php artisan breeze:install react

# Move the hidden files from /minha-regiao to the current directory
echo "Moving hidden files to the current directory..."
mv .* /app

# Move the content in the /minha-regiao directory to the current directory
echo "Moving Laravel files to the current directory..."
mv * /app

# Remove the minha-regiao directory
echo "Cleaning up..."
rm -rf minha-regiao

echo "Laravel installed successfully in the current directory."