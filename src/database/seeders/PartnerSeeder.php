<?php
namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name'      => [
                    'uz'      => 'O‘zbektelekom',
                    'ru'      => 'Узбектелеком',
                    'en'      => 'Uzbektelecom',
                    'default' => 'Uzbektelecom',
                ],
                'path'      => 'https://uztelecom.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Toshkent shahar hokimligi',
                    'ru'      => 'Хокимият города Ташкента',
                    'en'      => 'Tashkent City Administration',
                    'default' => 'Tashkent City Administration',
                ],
                'path'      => 'https://tashkent.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Samarqand turizm agentligi',
                    'ru'      => 'Агентство туризма Самарканда',
                    'en'      => 'Samarkand Tourism Agency',
                    'default' => 'Samarkand Tourism Agency',
                ],
                'path'      => 'https://samarkandtourism.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Buxoro xalq banki',
                    'ru'      => 'Народный банк Бухары',
                    'en'      => 'Bukhara People’s Bank',
                    'default' => 'Bukhara People’s Bank',
                ],
                'path'      => 'https://bukhara-bank.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Xiva san’at jamiyati',
                    'ru'      => 'Общество искусств Хивы',
                    'en'      => 'Khiva Arts Society',
                    'default' => 'Khiva Arts Society',
                ],
                'path'      => 'https://khivaarts.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Farg‘ona savdo palatasi',
                    'ru'      => 'Торговая палата Ферганы',
                    'en'      => 'Fergana Chamber of Commerce',
                    'default' => 'Fergana Chamber of Commerce',
                ],
                'path'      => 'https://ferganachamber.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Andijon sport klubi',
                    'ru'      => 'Спортивный клуб Андижана',
                    'en'      => 'Andijan Sports Club',
                    'default' => 'Andijan Sports Club',
                ],
                'path'      => 'https://andijansport.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Namangan transport kompaniyasi',
                    'ru'      => 'Транспортная компания Намангана',
                    'en'      => 'Namangan Transport Company',
                    'default' => 'Namangan Transport Company',
                ],
                'path'      => 'https://namangantransport.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Qashqadaryo energetika',
                    'ru'      => 'Кашкадарьинская энергетика',
                    'en'      => 'Kashkadarya Energy',
                    'default' => 'Kashkadarya Energy',
                ],
                'path'      => 'https://kashkadaryaenergy.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
            [
                'name'      => [
                    'uz'      => 'Surxondaryo qurilish',
                    'ru'      => 'Сурхандарьинское строительство',
                    'en'      => 'Surkhandarya Construction',
                    'default' => 'Surkhandarya Construction',
                ],
                'path'      => 'https://surkhandaryabuild.uz',
                'photo'     => 'client/assets/sponsors/chess-federation.svg',
                'is_active' => true,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
