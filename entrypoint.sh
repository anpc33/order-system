#!/bin/bash
php artisan optimize:clear

# Migrate & Seed (nếu cần)
php artisan migrate --force
php artisan db:seed --force

# Start Queue Worker (background)
php artisan queue:work --tries=3 &

# Serve Laravel App (listen 0.0.0.0:8000)
php artisan serve --host=0.0.0.0 --port=8000
