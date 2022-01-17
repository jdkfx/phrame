FROM php:8.0-apache
COPY ./php.ini /usr/local/etc/php/
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libonig-dev git zip unzip \
  && docker-php-ext-install pdo_mysql mysqli mbstring gd iconv
RUN a2enmod rewrite
RUN pecl install xdebug && docker-php-ext-enable xdebug