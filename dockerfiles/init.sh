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
chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/public/uploaded
chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/public/uploaded
chmod -R 775 /tmp
chown -R www-data:www-data /tmp
# Установка прав на нужные папки

nohup php artisan queue:work --daemon > /var/www/laravel/storage/logs/queue.log 2>&1 &
# Запуск PHP-FPM
php-fpm
