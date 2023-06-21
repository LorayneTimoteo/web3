FROM php:8.0-apache

RUN apt-get update && \
    apt-get install -y \
        libpq-dev \
        unzip \
        zip \
        && \
    docker-php-ext-install pdo pdo_pgsql && \
    a2enmod rewrite

WORKDIR /var/www/html