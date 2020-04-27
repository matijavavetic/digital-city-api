FROM php:7.4-fpm-alpine

COPY digital-city-api /var/www/digital-city-api

WORKDIR /var/www/digital-city-api

RUN  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
 && composer install --no-interaction --optimize-autoloader #--no-dev

RUN chown -R www-data:www-data /var/www/digital-city-api \
    && chmod -R 750 /var/www/digital-city-api

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
