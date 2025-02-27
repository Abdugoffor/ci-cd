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
        Category::create([
            "name"        => [
                'uz' => 'Olimpiada',
                'ru' => 'Олимпиада',
                'en' => 'Olympiad',
            ],
            "description" => [
                'uz' => 'Olimpiada musobaqasi haqida',
                'ru' => 'Олимпиадное соревнование',
                'en' => 'Olympiad competition',
            ],
            'slug'        => 'olympiad',
            'default'     => 'olympiad',
        ]);

        Category::create([
            "name"        => [
                'uz' => 'Turnir',
                'ru' => 'Турнир',
                'en' => 'Tournament',
            ],
            "description" => [
                'uz' => 'Turnir haqida batafsil',
                'ru' => 'Подробности о турнире',
                'en' => 'Details about the tournament',
            ],
            'slug'        => 'tournament',
            'default'     => 'tournament',
        ]);

        Category::create([
            "name"        => [
                'uz' => 'O‘rtoqlik uchrashuvi',
                'ru' => 'Товарищеский матч',
                'en' => 'Friendly match',
            ],
            "description" => [
                'uz' => 'O‘rtoqlik uchrashuvi haqida ma’lumot',
                'ru' => 'Информация о товарищеском матче',
                'en' => 'Information about the friendly match',
            ],
            'slug'        => 'friendly-match',
            'default'     => 'friendly-match',
        ]);

        Category::create([
            "name"        => [
                'uz' => 'Chempionat',
                'ru' => 'Чемпионат',
                'en' => 'Championship',
            ],
            "description" => [
                'uz' => 'Chempionat musobaqasi haqida',
                'ru' => 'О чемпионатных соревнованиях',
                'en' => 'About the championship competition',
            ],
            'slug'        => 'championship',
            'default'     => 'championship',
        ]);

        Category::create([
            "name"        => [
                'uz' => 'Musobaqa',
                'ru' => 'Соревнование',
                'en' => 'Competition',
            ],
            "description" => [
                'uz' => 'Musobaqa tafsilotlari',
                'ru' => 'Детали соревнования',
                'en' => 'Competition details',
            ],
            'slug'        => 'competition',
            'default'     => 'competition',
        ]);

    }
}
