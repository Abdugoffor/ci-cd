#!/bin/sh

# Composer install
composer install

# Копирование .env файла, если его нет
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Генерация ключа
php artisan key:generate
php artisan migrate
php artisan db:seed

# Очистка и кеширование конфигурации
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Установка прав на нужные папки
# chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache

# Запуск PHP-FPM
php-fpm
