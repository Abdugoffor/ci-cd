FROM php:8.2-fpm-alpine3.18

# Paketlarni yangilash va kerakli kutubxonalarni o‘rnatish
RUN apk update && apk add --no-cache \
    postgresql-dev \
    libpq \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    dos2unix \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql gd \
    && docker-php-ext-enable gd

# Composer o‘rnatish
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP sozlamalarini maxsus .ini faylda o‘rnatish
RUN echo "upload_max_filesize = 500M" > /usr/local/etc/php/conf.d/custom.ini \
    && echo "post_max_size = 500M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "sys_temp_dir = /tmp" >> /usr/local/etc/php/conf.d/custom.ini

# /tmp katalogini tekshirish va ruxsatlarni sozlash
RUN mkdir -p /tmp && \
    chmod 1777 /tmp && \
    chown www-data:www-data /tmp

# Ishchi katalogni belgilash
WORKDIR /var/www/laravel

# Loyiha fayllarini ko‘chirish
COPY src/ /var/www/laravel

# Composer dependency'larni o‘rnatish
RUN composer install --no-dev --optimize-autoloader

# Papka va fayllarni yaratish, ruxsatlarni sozlash
RUN mkdir -p /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes /var/www/laravel/storage/logs && \
    touch /var/www/laravel/storage/logs/laravel.log && \
    chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes && \
    chmod 664 /var/www/laravel/storage/logs/laravel.log && \
    chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/storage/logs /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes

# init.sh faylini ko‘chirish va ruxsat berish
COPY dockerfiles/init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh && dos2unix /usr/local/bin/init.sh

# Konteyner ishga tushganda init.sh ni bajarish
CMD ["sh", "/usr/local/bin/init.sh"]