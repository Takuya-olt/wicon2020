FROM mysql:8.0.3

EXPOSE 3306

FROM php:7.2-apache
RUN apt-get update  \
  && docker-php-ext-install pdo_mysql mysqli mbstring

WORKDIR /var/www/html

EXPOSE 80