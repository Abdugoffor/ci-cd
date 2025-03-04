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

# Установка рабочего каталога
WORKDIR /var/www/laravel

# Копирование файлов проекта
COPY src/ /var/www/laravel
# Установка прав на нужные папки
RUN chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache && \
    chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache

# Копируем init.sh и делаем его исполняемым
COPY dockerfiles/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh && dos2unix /usr/local/bin/init.sh

# Запуск init.sh при старте контейнера
CMD ["sh", "/usr/local/bin/init.sh"]
