<?php
namespace Database\Seeders;

use App\Models\Menyu;
use Illuminate\Database\Seeder;

class MenyuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menyus = [
            [
                'name' => [
                    'uz'      => 'Asosiy',
                    'ru'      => 'Главная',
                    'en'      => 'Home',
                    'default' => 'Home',
                ],
                'path' => '/',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Yangiliklar',
                    'ru'      => 'Новости',
                    'en'      => 'News',
                    'default' => 'News',
                ],
                'path' => '/news',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Mehmonxonalar',
                    'ru'      => 'Гостиницы',
                    'en'      => 'Hotels',
                    'default' => 'Hotels',
                ],
                'path' => '/hotels',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Tadbirlar',
                    'ru'      => 'Мероприятия',
                    'en'      => 'Events',
                    'default' => 'Events',
                ],
                'path' => '/events',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Biz haqimizda',
                    'ru'      => 'О нас',
                    'en'      => 'About Us',
                    'default' => 'About Us',
                ],
                'path' => '/about',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Aloqa',
                    'ru'      => 'Контакты',
                    'en'      => 'Contact',
                    'default' => 'Contact',
                ],
                'path' => '/contact',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Galereya',
                    'ru'      => 'Галерея',
                    'en'      => 'Gallery',
                    'default' => 'Gallery',
                ],
                'path' => '/gallery',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Xizmatlar',
                    'ru'      => 'Услуги',
                    'en'      => 'Services',
                    'default' => 'Services',
                ],
                'path' => '/services',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Bron qilish',
                    'ru'      => 'Бронирование',
                    'en'      => 'Booking',
                    'default' => 'Booking',
                ],
                'path' => '/booking',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'FAQ',
                    'ru'      => 'FAQ',
                    'en'      => 'FAQ',
                    'default' => 'FAQ',
                ],
                'path' => '/faq',
                'is_active' => true,
            ],
        ];

        foreach ($menyus as $menyu) {
            Menyu::create($menyu);
        }
    }
}
