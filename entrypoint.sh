#!/bin/bash

# Migrate & Seed
php artisan migrate --force
php artisan db:seed --force

# Start Queue Worker (in background)
php artisan queue:work --tries=3 &

# Serve Laravel App
php artisan serve --host=0.0.0.0 --port=8000
