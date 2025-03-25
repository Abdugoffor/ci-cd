#!/bin/sh

# Vendor direktoriyasini tekshirish (agar biron sababga ko‘ra yo‘q bo‘lsa)
if [ ! -d "/var/www/laravel/vendor" ]; then
    echo "Vendor directory not found, running composer install..."
    composer install --no-interaction --prefer-dist --optimize-autoloader || { echo "Composer install failed in init.sh"; exit 1; }
fi

# .env faylini tekshirish va nusxalash
if [ ! -f "/var/www/laravel/.env" ]; then
    echo "Copying .env.example to .env..."
    cp /var/www/laravel/.env.example /var/www/laravel/.env
fi

# Laravel sozlamalari
echo "Generating application key..."
php artisan key:generate
echo "Running migrations..."
php artisan migrate:fresh
echo "Running seeders..."
php artisan db:seed

# Keshlarni tozalash va yangilash
echo "Clearing and caching configurations..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ruxsatlarni qayta sozlash
echo "Setting permissions..."
chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes
chown -R www-data:www-data /var/www/laravel/storage /var/www/laravel/bootstrap/cache /var/www/laravel/public/uploaded /var/www/laravel/public/qrcodes

# Queue ishga tushirish
echo "Starting queue worker..."
nohup php artisan queue:work --daemon > /var/www/laravel/storage/logs/queue.log 2>&1 &

# PHP-FPM ishga tushirish
echo "Starting PHP-FPM..."
php-fpm