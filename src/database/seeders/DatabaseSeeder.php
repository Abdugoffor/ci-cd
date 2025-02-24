<?php

namespace Database\Seeders;

use App\Models\AccreditationCategory;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Category::create([
            'name' => [
                'uz' => 'Test',
                'ru' => 'Тест',
                'en' => 'Test'
            ],
            'slug' => 'test'
        ]);
        AccreditationCategory::create([
            'name' => [
                'uz' => 'Oʻyinchi',
                'ru' => 'Игрок',
                'en' => 'Player'
            ],
            'slug' => 'player'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'FIDE',
                'ru' => 'FIDE',
                'en' => 'FIDE'
            ],
            'slug' => 'fide'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'OAV',
                'ru' => 'СМИ',
                'en' => 'Media'
            ],
            'slug' => 'media'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Translyatsiya',
                'ru' => 'Трансляция',
                'en' => 'Broadcast'
            ],
            'slug' => 'broadcast'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Tashkiliy qo‘mita',
                'ru' => 'Орг. комитет',
                'en' => 'Org. Committee'
            ],
            'slug' => 'org-committee'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Xodimlar',
                'ru' => 'Персонал',
                'en' => 'Personnel'
            ],
            'slug' => 'personnel'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Ko‘ngilli',
                'ru' => 'Волонтёр',
                'en' => 'Volunteer'
            ],
            'slug' => 'volunteer'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Boshqaruvchi',
                'ru' => 'Арбитр',
                'en' => 'Arbiter'
            ],
            'slug' => 'arbiter'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Xavfsizlik xizmati',
                'ru' => 'Безопасность',
                'en' => 'Safety & Security'
            ],
            'slug' => 'safety-security'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'VIP',
                'ru' => 'VIP',
                'en' => 'VIP'
            ],
            'slug' => 'vip'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Marketing hamkori',
                'ru' => 'Маркетинговый партнер',
                'en' => 'Marketing Partner'
            ],
            'slug' => 'marketing-partner'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Mehmonxona xizmati',
                'ru' => 'Гостеприимство',
                'en' => 'Hospitality'
            ],
            'slug' => 'hospitality'
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Hamrohlik qiluvchi shaxs',
                'ru' => 'Сопровождающее лицо',
                'en' => 'Accompanying Person'
            ],
            'slug' => 'accompanying-person'
        ]);

    }
}
