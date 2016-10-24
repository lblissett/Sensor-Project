FROM php:5.6.24-apache

<<<<<<< HEAD
COPY config/php.ini /usr/local/etc/php
COPY htdocs/ /var/www/html

=======
>>>>>>> 55c8fad6161ac2983688531c8c1ef45a9307baf9
RUN a2enmod rewrite
