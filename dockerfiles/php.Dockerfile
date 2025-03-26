FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    libpq \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    dos2unix \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql gd zip \
    && docker-php-ext-enable gd zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN echo "upload_max_filesize = 500M" >> /usr/local/etc/php/php.ini \
#    && echo "post_max_size = 500M" >> /usr/local/etc/php/php.ini

WORKDIR /var/www/laravel

COPY src/composer.json src/composer.lock /var/www/laravel/
RUN composer install --no-scripts --no-interaction --prefer-dist --optimize-autoloader || { echo "Composer install failed"; exit 1; }

COPY src/ /var/www/laravel/

RUN chmod -R 755 /var/www/laravel/storage

# Ruxsatlar va direktoriyalarni sozlash
#RUN mkdir -p /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes /var/www/laravel/storage/logs && \
#    touch /var/www/laravel/storage/logs/laravel.log && \
#    chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes && \
#    chmod 664 /var/www/laravel/storage/logs/laravel.log && \
#    chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes

COPY dockerfiles/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh && dos2unix /usr/local/bin/init.sh

CMD ["sh", "/usr/local/bin/init.sh"]