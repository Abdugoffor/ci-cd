<?php
namespace Database\Seeders;

use App\Models\AccreditationCategory;
use Illuminate\Database\Seeder;

class AccreditationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccreditationCategory::create([
            'name' => [
                'uz' => 'Oʻyinchi',
                'ru' => 'Игрок',
                'en' => 'Player',
                'default' => 'player',
            ],
            'slug' => 'player',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'FIDE',
                'ru' => 'FIDE',
                'en' => 'FIDE',
                'default' => 'fide',
            ],
            'slug' => 'fide',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'OAV',
                'ru' => 'СМИ',
                'en' => 'Media',
                'default' => 'media',
            ],
            'slug' => 'media',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Translyatsiya',
                'ru' => 'Трансляция',
                'en' => 'Broadcast',
                'default' => 'broadcast',
            ],
            'slug' => 'broadcast',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Tashkiliy qo‘mita',
                'ru' => 'Орг. комитет',
                'en' => 'Org. Committee',
                'default' => 'org-committee',
            ],
            'slug' => 'org-committee',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Xodimlar',
                'ru' => 'Персонал',
                'en' => 'Personnel',
                'default' => 'personnel',
            ],
            'slug' => 'personnel',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Ko‘ngilli',
                'ru' => 'Волонтёр',
                'en' => 'Volunteer',
                'default' => 'volunteer',
            ],
            'slug' => 'volunteer',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Boshqaruvchi',
                'ru' => 'Арбитр',
                'en' => 'Arbiter',
                'default' => 'arbiter',
            ],
            'slug' => 'arbiter',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Xavfsizlik xizmati',
                'ru' => 'Безопасность',
                'en' => 'Safety & Security',
                'default' => 'safety-security',
            ],
            'slug' => 'safety-security',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'VIP',
                'ru' => 'VIP',
                'en' => 'VIP',
                'default' => 'vip',
            ],
            'slug' => 'vip',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Marketing hamkori',
                'ru' => 'Маркетинговый партнер',
                'en' => 'Marketing Partner',
                'default' => 'marketing-partner',
            ],
            'slug' => 'marketing-partner',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Mehmonxona xizmati',
                'ru' => 'Гостеприимство',
                'en' => 'Hospitality',
                'default' => 'hospitality',
            ],
            'slug' => 'hospitality',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Hamrohlik qiluvchi shaxs',
                'ru' => 'Сопровождающее лицо',
                'en' => 'Accompanying Person',
                'default' => 'accompanying-person',
            ],
            'slug' => 'accompanying-person',
        ]);

    }
}
