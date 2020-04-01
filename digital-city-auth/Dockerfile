#STAGE 0
FROM composer:1.9.3 as composer

COPY . /var/www/digital-city-auth

WORKDIR /var/www/digital-city-auth

RUN composer install --no-interaction --optimize-autoloader #--no-dev

#STAGE 1
FROM php:7.4-fpm-alpine

COPY --from=composer /var/www/digital-city-auth /var/www/digital-city-auth

WORKDIR /var/www/digital-city-auth

RUN chown -R www-data:www-data /var/www/digital-city-auth \
    && chmod -R 750 /var/www/digital-city-auth

RUN apk update && apk add --no-cache oniguruma-dev \
    unzip \
    libxml2-dev

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    sockets \
    json \
    soap \
    mbstring \
    opcache \
    && docker-php-source delete

RUN rm -rf /var/cache/apk/*

EXPOSE 9000