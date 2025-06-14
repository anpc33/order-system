FROM php:8.2-fpm

# Cài các thư viện hệ thống cần thiết
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev \
    libzip-dev libjpeg-dev libfreetype6-dev libicu-dev \
    libmcrypt-dev default-mysql-client \
    libssl-dev pkg-config

# Cài extensions Laravel cần
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ code vào
COPY . .

# Cài Composer & frontend
RUN composer install --no-dev --optimize-autoloader \
 && npm install \
 && npm run build

# Set quyền cho Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Lệnh khi container khởi động
CMD php artisan migrate --force && php-fpm
