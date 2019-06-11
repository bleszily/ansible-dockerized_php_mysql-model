FROM php:7.2-apache
LABEL maintainer="jkf.local"
COPY ./index.php /var/www/html/
RUN docker-php-ext-install mysqli pdo pdo_mysql
EXPOSE 80
