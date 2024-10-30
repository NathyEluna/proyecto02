FROM php:8.3-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y git unzip unzip

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./xdebug/debug.ini "${PHP_INI_DIR}/conf.d"

WORKDIR /var/www/html

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin

RUN install-php-extensions gd pdo_mysql bcmath zip intl opcache