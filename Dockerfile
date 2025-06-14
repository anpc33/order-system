# Stage 1: build node assets
FROM node:18 AS node-build

WORKDIR /app
COPY . .

# Cài frontend dependencies & build Vite
RUN npm install && npm run build


# Stage 2: build PHP backend
FROM php:8.2-fpm

# Cài các extension và gói hệ thống
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libzip-dev libjpeg-dev libfreetype6-dev libicu-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục app
WORKDIR /var/www

# Copy toàn bộ source code
COPY . .

# Copy các file đã build từ Node stage
COPY --from=node-build /app/public/build ./public/build

# Cài composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set quyền thư mục
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Lệnh chạy khi container start
CMD php artisan migrate --force && php-fpm
