FROM php:5.6.24-apache

COPY config/php.ini /usr/local/etc/php

RUN apt-get update && apt-get install -y \
        nano \
        php5-mysql \ 
        libmcrypt-dev 

RUN docker-php-ext-install mysqli \
        pdo \
        pdo_mysql mcrypt \
        pdo_mysql \
        json

RUN a2enmod rewrite
