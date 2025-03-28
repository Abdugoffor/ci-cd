<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'slug'        => 'olympiad',
                'name'        => [
                    'uz'      => 'Olimpiada',
                    'ru'      => 'Олимпиада',
                    'en'      => 'Olympiad',
                    'default' => 'Olympiad',
                ],
                'description' => [
                    'uz'      => 'Olimpiada musobaqasi haqida',
                    'ru'      => 'Олимпиадное соревнование',
                    'en'      => 'Olympiad competition',
                    'default' => 'Olympiad competition',
                ],
            ],
            [
                'slug'        => 'tournament',
                'name'        => [
                    'uz'      => 'Turnir',
                    'ru'      => 'Турнир',
                    'en'      => 'Tournament',
                    'default' => 'Tournament',
                ],
                'description' => [
                    'uz'      => 'Turnir haqida batafsil',
                    'ru'      => 'Подробности о турнире',
                    'en'      => 'Details about the tournament',
                    'default' => 'Details about the tournament',
                ],
            ],
            [
                'slug'        => 'friendly-match',
                'name'        => [
                    'uz'      => 'O‘rtoqlik uchrashuvi',
                    'ru'      => 'Товарищеский матч',
                    'en'      => 'Friendly match',
                    'default' => 'Friendly match',
                ],
                'description' => [
                    'uz'      => 'O‘rtoqlik uchrashuvi haqida ma’lumot',
                    'ru'      => 'Информация о товарищеском матче',
                    'en'      => 'Information about the friendly match',
                    'default' => 'Information about the friendly match',
                ],
            ],
            [
                'slug'        => 'championship',
                'name'        => [
                    'uz'      => 'Chempionat',
                    'ru'      => 'Чемпионат',
                    'en'      => 'Championship',
                    'default' => 'Championship',
                ],
                'description' => [
                    'uz'      => 'Chempionat musobaqasi haqida',
                    'ru'      => 'О чемпионатных соревнованиях',
                    'en'      => 'About the championship competition',
                    'default' => 'About the championship competition',
                ],
            ],
            [
                'slug'        => 'competition',
                'name'        => [
                    'uz'      => 'Musobaqa',
                    'ru'      => 'Соревнование',
                    'en'      => 'Competition',
                    'default' => 'Competition',
                ],
                'description' => [
                    'uz'      => 'Musobaqa tafsilotlari',
                    'ru'      => 'Детали соревнования',
                    'en'      => 'Competition details',
                    'default' => 'Competition details',
                ],
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']], // Tekshiriladigan unikal maydon
                $category                      // Agar mavjud bo‘lmasa, shu qiymatlar bilan yaratadi
            );
        }

    }

}
