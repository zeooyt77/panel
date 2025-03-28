#!/bin/bash

# Update system
apt update && apt upgrade -y

# Install dependencies
apt install -y \
    php8.1 \
    php8.1-cli \
    php8.1-gd \
    php8.1-mysql \
    php8.1-pdo \
    php8.1-mbstring \
    php8.1-tokenizer \
    php8.1-bcmath \
    php8.1-xml \
    php8.1-curl \
    php8.1-zip \
    mariadb-server \
    nginx \
    redis-server \
    docker.io \
    docker-compose

# Clone repository
git clone https://github.com/yourusername/finexlyx.git /var/www/finexlyx

# Set permissions
chown -R www-data:www-data /var/www/finexlyx
chmod -R 755 /var/www/finexlyx

# Install composer dependencies
composer install --no-dev --optimize-autoloader

# Generate key
php artisan key:generate --force

# Run migrations
php artisan migrate --force

# Start services
systemctl enable --now docker
systemctl enable --now nginx
systemctl enable --now redis-server

# Build and start containers
docker-compose up -d