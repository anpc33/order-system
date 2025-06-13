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

# Copy source code
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader


# Install Node.js & npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Build frontend assets
RUN npm install && NODE_ENV=production npm run build

# Copy entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Start
CMD ["entrypoint.sh"]

# Permissions (tạo build nếu chưa có để tránh lỗi)
RUN mkdir -p /var/www/public/build && \
    chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public/build
