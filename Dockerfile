FROM php:8.2-fpm

# Cài các dependency PHP cần thiết
RUN apt-get update && apt-get install -y \
    build-essential libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip git curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copy Composer từ container chính thức
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ source code
COPY . .

# Copy file env nếu cần (nếu bạn dùng CI/CD có thể tạo lệnh riêng)
# COPY .env.production .env

# Cài Composer (chạy trong môi trường production)
RUN composer install --no-dev --optimize-autoloader

# CHÚ Ý: npm install + build phải làm ngoài container!

# Cấp quyền cho Laravel
RUN chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]
