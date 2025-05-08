FROM php:8.2-cli-bullseye

# Installer les extensions nécessaires à Laravel
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Créer un dossier de travail
WORKDIR /var/www

# Installer Laravel
RUN composer create-project --prefer-dist laravel/laravel laraveltest

# Définir le dossier du projet
WORKDIR /var/www/laraveltest

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8001"]
