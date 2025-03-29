FROM php:8.1-apache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libonig-dev git zip unzip \
  && docker-php-ext-install pdo_mysql mysqli mbstring gd \
  && a2enmod rewrite

RUN pecl install xdebug && docker-php-ext-enable xdebug
