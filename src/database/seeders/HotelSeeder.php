<?php
namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'title'       => [
                    'uz'      => 'Olimpiada',
                    'ru'      => 'Олимпиада',
                    'en'      => 'Olympiad',
                    'default' => 'Olympiad',
                ],
                'description' => [
                    'uz'      => 'Sportchilar uchun qulay mehmonxona',
                    'ru'      => 'Удобная гостиница для спортсменов',
                    'en'      => 'Comfortable hotel for athletes',
                    'default' => 'Comfortable hotel for athletes',
                ],
                'text'        => [
                    'uz'      => 'Toshkentdagi eng yaxshi mehmonxonalardan biri',
                    'ru'      => 'Одна из лучших гостиниц в Ташкенте',
                    'en'      => 'One of the best hotels in Tashkent',
                    'default' => 'One of the best hotels in Tashkent',
                ],
                'photo'       => 'uploaded/olympiad_hotel.jpg',
                'rating'      => 4.5,
                'location'    => 'Toshkent, Chilanzar',
                'phone'       => '+998901234567',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Registon',
                    'ru'      => 'Регстан',
                    'en'      => 'Registan',
                    'default' => 'Registan',
                ],
                'description' => [
                    'uz'      => 'Tarixiy joylarga yaqin mehmonxona',
                    'ru'      => 'Гостиница рядом с историческими местами',
                    'en'      => 'Hotel near historical sites',
                    'default' => 'Hotel near historical sites',
                ],
                'text'        => [
                    'uz'      => 'Samarqandning markazida joylashgan',
                    'ru'      => 'Расположена в центре Самарканда',
                    'en'      => 'Located in the center of Samarkand',
                    'default' => 'Located in the center of Samarkand',
                ],
                'photo'       => 'uploaded/registan_hotel.jpg',
                'rating'      => 4.8,
                'location'    => 'Samarqand, Registon ko‘chasi',
                'phone'       => '+998901234568',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Buxoro saroyi',
                    'ru'      => 'Бухарский дворец',
                    'en'      => 'Bukhara Palace',
                    'default' => 'Bukhara Palace',
                ],
                'description' => [
                    'uz'      => 'Hashamatli va an’anaviy mehmonxona',
                    'ru'      => 'Роскошная и традиционная гостиница',
                    'en'      => 'Luxurious and traditional hotel',
                    'default' => 'Luxurious and traditional hotel',
                ],
                'text'        => [
                    'uz'      => 'Buxoro shahridagi eng muhtasham joy',
                    'ru'      => 'Самое великолепное место в Бухаре',
                    'en'      => 'The most magnificent place in Bukhara',
                    'default' => 'The most magnificent place in Bukhara',
                ],
                'photo'       => 'uploaded/bukhara_palace.jpg',
                'rating'      => 4.7,
                'location'    => 'Buxoro, Ark qal’asi',
                'phone'       => '+998901234569',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Xiva oazisi',
                    'ru'      => 'Хивский оазис',
                    'en'      => 'Khiva Oasis',
                    'default' => 'Khiva Oasis',
                ],
                'description' => [
                    'uz'      => 'Qadimiy shahar ichidagi dam olish maskani',
                    'ru'      => 'Место отдыха в древнем городе',
                    'en'      => 'Resting place in an ancient city',
                    'default' => 'Resting place in an ancient city',
                ],
                'text'        => [
                    'uz'      => 'Xiva shahrining tinch muhitida',
                    'ru'      => 'В тихой атмосфере Хивы',
                    'en'      => 'In the peaceful atmosphere of Khiva',
                    'default' => 'In the peaceful atmosphere of Khiva',
                ],
                'photo'       => 'uploaded/khiva_oasis.jpg',
                'rating'      => 4.3,
                'location'    => 'Xiva, Ichan-Qala',
                'phone'       => '+998901234570',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Toshkent yulduzi',
                    'ru'      => 'Ташкентская звезда',
                    'en'      => 'Tashkent Star',
                    'default' => 'Tashkent Star',
                ],
                'description' => [
                    'uz'      => 'Zamonaviy va qulay mehmonxona',
                    'ru'      => 'Современная и удобная гостиница',
                    'en'      => 'Modern and comfortable hotel',
                    'default' => 'Modern and comfortable hotel',
                ],
                'text'        => [
                    'uz'      => 'Poytaxtning eng yaxshi joylaridan biri',
                    'ru'      => 'Одно из лучших мест столицы',
                    'en'      => 'One of the best spots in the capital',
                    'default' => 'One of the best spots in the capital',
                ],
                'photo'       => 'frontend/assets/news/detail1.svg',
                'rating'      => 4.6,
                'location'    => 'Toshkent, Yunusobod',
                'phone'       => '+998901234571',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Farg‘ona dam olish maskani',
                    'ru'      => 'Ферганский курорт',
                    'en'      => 'Fergana Resort',
                    'default' => 'Fergana Resort',
                ],
                'description' => [
                    'uz'      => 'Tabiat qo‘ynidagi tinch mehmonxona',
                    'ru'      => 'Тихая гостиница на лоне природы',
                    'en'      => 'Quiet hotel amidst nature',
                    'default' => 'Quiet hotel amidst nature',
                ],
                'text'        => [
                    'uz'      => 'Farg‘ona vodiysining eng yaxshi joyi',
                    'ru'      => 'Лучшее место в Ферганской долине',
                    'en'      => 'The best spot in Fergana Valley',
                    'default' => 'The best spot in Fergana Valley',
                ],
                'photo'       => 'uploaded/fergana_resort.jpg',
                'rating'      => 4.4,
                'location'    => 'Farg‘ona, Alay',
                'phone'       => '+998901234572',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Andijon qasri',
                    'ru'      => 'Андижанский дворец',
                    'en'      => 'Andijan Palace',
                    'default' => 'Andijan Palace',
                ],
                'description' => [
                    'uz'      => 'Shahar markazidagi hashamatli mehmonxona',
                    'ru'      => 'Роскошная гостиница в центре города',
                    'en'      => 'Luxurious hotel in the city center',
                    'default' => 'Luxurious hotel in the city center',
                ],
                'text'        => [
                    'uz'      => 'Andijonning eng mashhur joylaridan biri',
                    'ru'      => 'Одно из самых популярных мест Андижана',
                    'en'      => 'One of the most popular places in Andijan',
                    'default' => 'One of the most popular places in Andijan',
                ],
                'photo'       => 'frontend/assets/news/detail1.svg',
                'rating'      => 4.2,
                'location'    => 'Andijon, Navoiy ko‘chasi',
                'phone'       => '+998901234573',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Namangan bog‘i',
                    'ru'      => 'Наманганский сад',
                    'en'      => 'Namangan Garden',
                    'default' => 'Namangan Garden',
                ],
                'description' => [
                    'uz'      => 'Yashil hududdagi tinch mehmonxona',
                    'ru'      => 'Тихая гостиница в зелёной зоне',
                    'en'      => 'Quiet hotel in a green area',
                    'default' => 'Quiet hotel in a green area',
                ],
                'text'        => [
                    'uz'      => 'Namanganning eng sokin joylaridan biri',
                    'ru'      => 'Одно из самых спокойных мест Намангана',
                    'en'      => 'One of the calmest places in Namangan',
                    'default' => 'One of the calmest places in Namangan',
                ],
                'photo'       => 'frontend/assets/news/detail1.svg',
                'rating'      => 4.1,
                'location'    => 'Namangan, Bog‘ ko‘chasi',
                'phone'       => '+998901234574',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Qashqadaryo yulduzi',
                    'ru'      => 'Кашкадарьинская звезда',
                    'en'      => 'Kashkadarya Star',
                    'default' => 'Kashkadarya Star',
                ],
                'description' => [
                    'uz'      => 'Qulay va arzon mehmonxona',
                    'ru'      => 'Удобная и недорогая гостиница',
                    'en'      => 'Comfortable and affordable hotel',
                    'default' => 'Comfortable and affordable hotel',
                ],
                'text'        => [
                    'uz'      => 'Qarshi shahridagi eng yaxshi tanlov',
                    'ru'      => 'Лучший выбор в Карши',
                    'en'      => 'The best choice in Karshi',
                    'default' => 'The best choice in Karshi',
                ],
                'photo'       => 'frontend/assets/news/detail1.svg',
                'rating'      => 4.0,
                'location'    => 'Qarshi, Mustaqillik ko‘chasi',
                'phone'       => '+998901234575',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Surxondaryo o‘rmoni',
                    'ru'      => 'Сурхандарьинский лес',
                    'en'      => 'Surkhandarya Forest',
                    'default' => 'Surkhandarya Forest',
                ],
                'description' => [
                    'uz'      => 'Tabiatdagi dam olish maskani',
                    'ru'      => 'Место отдыха в природе',
                    'en'      => 'Nature retreat',
                    'default' => 'Nature retreat',
                ],
                'text'        => [
                    'uz'      => 'Termizdagi eng yashil hudud',
                    'ru'      => 'Самая зелёная зона в Термезе',
                    'en'      => 'The greenest area in Termez',
                    'default' => 'The greenest area in Termez',
                ],
                'photo'       => 'frontend/assets/news/detail1.svg',
                'rating'      => 4.5,
                'location'    => 'Termiz, O‘rmon ko‘chasi',
                'phone'       => '+998901234576',
                'is_active'   => true,
            ],
        ];
        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
