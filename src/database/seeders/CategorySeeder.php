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
            "name" => [
                'uz' => 'Olimpiada',
                'ru' => 'Олимпиада',
                'en' => 'Olympiad',
            ],
            'slug' => 'olympiad',
        ]);

        Category::create([
            "name" => [
                'uz' => 'Turnir',
                'ru' => 'Турнир',
                'en' => 'Tournament',
            ],
            'slug' => 'tournament',
        ]);

        Category::create([
            "name" => [
                'uz' => 'O‘rtoqlik uchrashuvi',
                'ru' => 'Товарищеский матч',
                'en' => 'Friendly match',
            ],
            'slug' => 'friendly-match',
        ]);

        Category::create([
            "name" => [
                'uz' => 'Chempionat',
                'ru' => 'Чемпионат',
                'en' => 'Championship',
            ],
            'slug' => 'championship',
        ]);

        Category::create([
            "name" => [
                'uz' => 'Musobaqa',
                'ru' => 'Соревнование',
                'en' => 'Competition',
            ],
            'slug' => 'competition',
        ]);

    }
}
