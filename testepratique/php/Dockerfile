FROM php:8.1-fpm

# Installe les extensions nécessaires à MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Optionnel : pour le développement
RUN apt-get update && apt-get install -y vim zip unzip
