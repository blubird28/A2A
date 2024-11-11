# Use the base PHP 8.2 FPM image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install PHP extensions, including MySQL PDO
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql

# Copy Laravel files (assumes files are in the project root)
COPY . /var/www/html

# Ensure storage and bootstrap cache are writable
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html

# Expose port 9000 to allow Nginx to connect
EXPOSE 9000
