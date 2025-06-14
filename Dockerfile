FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    libpq-dev \
    curl \
    && docker-php-ext-install pdo_pgsql pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

FROM php:8.2-fpm

# Cài dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libzip-dev libonig-dev libpq-dev libicu-dev libjpeg-dev libfreetype6-dev \
    libmcrypt-dev libssl-dev default-mysql-client

# Cài extensions cho Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ code
COPY . .

# Cài package
RUN composer install --no-dev --optimize-autoloader \
 && npm install \
 && npm run build

# Set quyền
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

CMD php artisan migrate --force && php-fpm
