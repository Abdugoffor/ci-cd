FROM php:8.2-fpm-alpine

# Установка необходимых расширений PHP
RUN apk add --no-cache \
    postgresql-dev \
    libpq \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    dos2unix \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql gd \
    && docker-php-ext-enable gd

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP konfiguratsiyasini o‘zgartirish
RUN echo "upload_max_filesize = 500M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 500M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_tmp_dir = /tmp" >> /usr/local/etc/php/conf.d/uploads.ini

# /tmp va boshqa direktoriyalarni sozlash
RUN mkdir -p /tmp \
    && chmod -R 775 /tmp \
    && chown -R www-data:www-data /tmp \
    && mkdir -p /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes /var/www/laravel/storage/logs \
    && touch /var/www/laravel/storage/logs/laravel.log \
    && chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes \
    && chmod 664 /var/www/laravel/storage/logs/laravel.log \
    && chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes

# Установка рабочего каталога
WORKDIR /var/www/laravel

# Копирование файлов проекта
COPY src/ /var/www/laravel

# Composer install ni Dockerfile ichida bajarish
RUN composer install --no-scripts --no-interaction --optimize-autoloader

# Копируем init.sh и делаем его исполняемым
COPY dockerfiles/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh && dos2unix /usr/local/bin/init.sh

# Запуск init.sh при старте контейнера
CMD ["sh", "/usr/local/bin/init.sh"]