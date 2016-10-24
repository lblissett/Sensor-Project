FROM php:5.6.24-apache

COPY config/php.ini /usr/local/etc/php
COPY htdocs/ /var/www/html

RUN apt-get update && apt-get install -y \
        nano

RUN a2enmod rewrite
