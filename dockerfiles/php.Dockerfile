FROM php:8.2-fpm-alpine

# Установка необходимых расширений PHP, shu jumladan zip
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

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP konfiguratsiyasini o‘zgartirish
RUN echo "upload_max_filesize = 500M" >> /usr/local/etc/php/php.ini \
    && echo "post_max_size = 500M" >> /usr/local/etc/php/php.ini

# Установка рабочего каталога
WORKDIR /var/www/laravel

# Копирование composer.json va composer.lock avval
COPY src/composer.json src/composer.lock /var/www/laravel/
RUN composer install --no-scripts --no-interaction --prefer-dist

# Копирование оставшихся файлов проекта
COPY src/ /var/www/laravel/

# Ruxsatlar va direktoriyalar
RUN mkdir -p /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes /var/www/laravel/storage/logs && \
    touch /var/www/laravel/storage/logs/laravel.log && \
    chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes && \
    chmod 664 /var/www/laravel/storage/logs/laravel.log && \
    chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes

# Копируем init.sh и делаем его исполняемым
COPY dockerfiles/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh && dos2unix /usr/local/bin/init.sh

# Запуск init.sh при старте контейнера
CMD ["sh", "/usr/local/bin/init.sh"]