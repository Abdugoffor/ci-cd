<?php
namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TurnirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tournaments = [
            [
                'name'               => [
                    'uz'      => '46th FIDEi',
                    'ru'      => '46th FIDE',
                    'en'      => '46th FIDE',
                    'default' => '46th FIDE',
                ],
                'title'              => [
                    'uz'      => 'Buxoro chempionati',
                    'ru'      => 'Чемпионат Бухары',
                    'en'      => 'Bukhara Championship',
                    'default' => 'Bukhara Championship',
                ],
                'description'        => [
                    'uz'      => 'Buxoroda yillik shaxmat musobaqasi',
                    'ru'      => 'Ежегодный шахматный турнир в Бухаре',
                    'en'      => 'Annual chess tournament in Bukhara',
                    'default' => 'Annual chess tournament in Bukhara',
                ],
                'country_id'         => 1,
                'category_id'        => 2,
                'registration_start' => '2025-04-01',
                'registration_end'   => '2025-04-15',
                'start_date'         => '2025-05-01',
                'end_date'           => '2025-05-10',
                'logo'               => 'bukhara.png',
                'status'             => 'pending',
            ],
            [
                'name'               => [
                    'uz'      => '46th FIDEi',
                    'ru'      => '46th FIDE',
                    'en'      => '46th FIDE',
                    'default' => '46th FIDE',
                ],
                'title'              => [
                    'uz'      => 'Samarqand kubogi',
                    'ru'      => 'Кубок Самарканда',
                    'en'      => 'Samarkand Cup',
                    'default' => 'Samarkand Cup',
                ],
                'description'        => [
                    'uz'      => 'Samarqandda ochiq shaxmat turniri',
                    'ru'      => 'Открытый шахматный турнир в Самарканде',
                    'en'      => 'Open chess tournament in Samarkand',
                    'default' => 'Open chess tournament in Samarkand',
                ],
                'country_id'         => 1,
                'category_id'        => 2,
                'registration_start' => '2025-06-01',
                'registration_end'   => '2025-06-10',
                'start_date'         => '2025-06-15',
                'end_date'           => '2025-06-20',
                'logo'               => 'samarkand.png',
                'status'             => 'pending',
            ],
            [
                'name'               => [
                    'uz'      => '46th FIDEi',
                    'ru'      => '46th FIDE',
                    'en'      => '46th FIDE',
                    'default' => '46th FIDE',
                ],
                'title'              => [
                    'uz'      => 'Toshkent ochiq turniri',
                    'ru'      => 'Ташкентский открытый турнир',
                    'en'      => 'Tashkent Open Tournament',
                    'default' => 'Tashkent Open Tournament',
                ],
                'description'        => [
                    'uz'      => 'Toshkent shahrida xalqaro shaxmat musobaqasi',
                    'ru'      => 'Международный шахматный турнир в Ташкенте',
                    'en'      => 'International chess tournament in Tashkent',
                    'default' => 'International chess tournament in Tashkent',
                ],
                'country_id'         => 1,
                'category_id'        => 2,
                'registration_start' => '2025-07-01',
                'registration_end'   => '2025-07-10',
                'start_date'         => '2025-07-15',
                'end_date'           => '2025-07-25',
                'logo'               => 'tashkent.png',
                'status'             => 'pending',
            ],
            [
                'name'               => [
                    'uz'      => '46th FIDEi',
                    'ru'      => '46th FIDE',
                    'en'      => '46th FIDE',
                    'default' => '46th FIDE',
                ],
                'title'              => [
                    'uz'      => 'Xiva oazisi',
                    'ru'      => 'Хивский оазис',
                    'en'      => 'Khiva Oasis',
                    'default' => 'Khiva Oasis',
                ],
                'description'        => [
                    'uz'      => 'Qadimiy shahar ichidagi dam olish maskani',
                    'ru'      => 'Место отдыха в древнем городе',
                    'en'      => 'Resting place in an ancient city',
                    'default' => 'Resting place in an ancient city',
                ],
                'country_id'         => 1,
                'category_id'        => 2,
                'registration_start' => '2025-08-01',
                'registration_end'   => '2025-08-10',
                'start_date'         => '2025-08-15',
                'end_date'           => '2025-08-20',
                'logo'               => 'khiva.png',
                'status'             => 'pending',
            ],
            [
                'name'               => [
                    'uz'      => '46th FIDEi',
                    'ru'      => '46th FIDE',
                    'en'      => '46th FIDE',
                    'default' => '46th FIDE',
                ],
                'title'              => [
                    'uz'      => 'Andijon chempionati',
                    'ru'      => 'Чемпионат Андижана',
                    'en'      => 'Andijan Championship',
                    'default' => 'Andijan Championship',
                ],
                'description'        => [
                    'uz'      => 'Andijon shahrida yoshlar o‘rtasidagi turnir',
                    'ru'      => 'Турнир среди молодежи в Андижане',
                    'en'      => 'Youth tournament in Andijan',
                    'default' => 'Youth tournament in Andijan',
                ],
                'country_id'         => 1,
                'category_id'        => 2,
                'registration_start' => '2025-09-01',
                'registration_end'   => '2025-09-10',
                'start_date'         => '2025-09-15',
                'end_date'           => '2025-09-20',
                'logo'               => 'andijan.png',
                'status'             => 'pending',
            ],
        ];

        foreach ($tournaments as $data) {
            Tournament::create($data);
        }

    }
}
