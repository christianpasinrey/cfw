FROM php:8.2-fpm

# Instalar extensiones PDO necesarias (por ejemplo, para MySQL)
RUN docker-php-ext-install pdo pdo_mysql
