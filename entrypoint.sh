#!/bin/bash

# Clear cache & optimize
php artisan optimize:clear

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Cache config, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage symlink
php artisan storage:link

# Run database migrations & seeders
php artisan migrate --force
php artisan db:seed --force

# Start queue worker (in background)
php artisan queue:work --tries=3 &

# Serve Laravel app on 0.0.0.0:8000 using built-in PHP server
php -S 0.0.0.0:8000 -t public
