FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    libpq \
    && docker-php-ext-install pdo pdo_pgsql pgsql
