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
                'url' => '/',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Yangiliklar',
                    'ru'      => 'Новости',
                    'en'      => 'News',
                    'default' => 'News',
                ],
                'url' => '/news',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Mehmonxonalar',
                    'ru'      => 'Гостиницы',
                    'en'      => 'Hotels',
                    'default' => 'Hotels',
                ],
                'url' => '/hotels',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Tadbirlar',
                    'ru'      => 'Мероприятия',
                    'en'      => 'Events',
                    'default' => 'Events',
                ],
                'url' => '/events',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Biz haqimizda',
                    'ru'      => 'О нас',
                    'en'      => 'About Us',
                    'default' => 'About Us',
                ],
                'url' => '/about',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Aloqa',
                    'ru'      => 'Контакты',
                    'en'      => 'Contact',
                    'default' => 'Contact',
                ],
                'url' => '/contact',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Galereya',
                    'ru'      => 'Галерея',
                    'en'      => 'Gallery',
                    'default' => 'Gallery',
                ],
                'url' => '/gallery',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Xizmatlar',
                    'ru'      => 'Услуги',
                    'en'      => 'Services',
                    'default' => 'Services',
                ],
                'url' => '/services',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'Bron qilish',
                    'ru'      => 'Бронирование',
                    'en'      => 'Booking',
                    'default' => 'Booking',
                ],
                'url' => '/booking',
                'is_active' => true,
            ],
            [
                'name' => [
                    'uz'      => 'FAQ',
                    'ru'      => 'FAQ',
                    'en'      => 'FAQ',
                    'default' => 'FAQ',
                ],
                'url' => '/faq',
                'is_active' => true,
            ],
        ];

        foreach ($menyus as $menyu) {
            Menyu::create($menyu);
        }
    }
}
