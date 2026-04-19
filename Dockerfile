FROM php:8.2-cli

WORKDIR /var/www

# Copier le projet
COPY . /var/www

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# 🔥 FIX IMPORTANT (ton erreur actuelle)
RUN mkdir -p /var/www/storage/framework/views \
    /var/www/storage/framework/cache \
    /var/www/storage/framework/sessions \
    /var/www/bootstrap/cache \
 && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Nettoyer caches Laravel
RUN php artisan optimize:clear || true

# Lancer le serveur
CMD php artisan serve --host=0.0.0.0 --port=$PORT
RUN mkdir -p /var/www/storage/framework/views \
    /var/www/storage/framework/cache \
    /var/www/storage/framework/sessions \
    /var/www/bootstrap/cache \
 && chmod -R 775 /var/www/storage /var/www/bootstrap/cache
