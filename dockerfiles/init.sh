#!/bin/sh

# Composer install bilan log yozish
echo "Running composer install..."
composer install --no-interaction --prefer-dist || { echo "Composer install failed"; exit 1; }

# Keyingi qadamlar
if [ ! -f .env ]; then
    cp .env.example .env
fi

php artisan key:generate
php artisan migrate
php artisan db:seed

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/public/uploaded
chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/public/uploaded
chmod -R 775 /tmp
chown -R www-data:www-data /tmp

nohup php artisan queue:work --daemon > /var/www/laravel/storage/logs/queue.log 2>&1 &
php-fpm