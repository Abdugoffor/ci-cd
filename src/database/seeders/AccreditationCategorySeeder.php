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
            ],
            'slug' => 'player',
            'default' => 'player',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'FIDE',
                'ru' => 'FIDE',
                'en' => 'FIDE',
            ],
            'slug' => 'fide',
            'default' => 'fide',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'OAV',
                'ru' => 'СМИ',
                'en' => 'Media',
            ],
            'slug' => 'media',
            'default' => 'media',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Translyatsiya',
                'ru' => 'Трансляция',
                'en' => 'Broadcast',
            ],
            'slug' => 'broadcast',
            'default' => 'broadcast',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Tashkiliy qo‘mita',
                'ru' => 'Орг. комитет',
                'en' => 'Org. Committee',
            ],
            'slug' => 'org-committee',
            'default' => 'org-committee',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Xodimlar',
                'ru' => 'Персонал',
                'en' => 'Personnel',
            ],
            'slug' => 'personnel',
            'default' => 'personnel',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Ko‘ngilli',
                'ru' => 'Волонтёр',
                'en' => 'Volunteer',
            ],
            'slug' => 'volunteer',
            'default' => 'volunteer',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Boshqaruvchi',
                'ru' => 'Арбитр',
                'en' => 'Arbiter',
            ],
            'slug' => 'arbiter',
            'default' => 'arbiter',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Xavfsizlik xizmati',
                'ru' => 'Безопасность',
                'en' => 'Safety & Security',
            ],
            'slug' => 'safety-security',
            'default' => 'safety-security',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'VIP',
                'ru' => 'VIP',
                'en' => 'VIP',
            ],
            'slug' => 'vip',
            'default' => 'vip',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Marketing hamkori',
                'ru' => 'Маркетинговый партнер',
                'en' => 'Marketing Partner',
            ],
            'slug' => 'marketing-partner',
            'default' => 'marketing-partner',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Mehmonxona xizmati',
                'ru' => 'Гостеприимство',
                'en' => 'Hospitality',
            ],
            'slug' => 'hospitality',
            'default' => 'hospitality',
        ]);

        AccreditationCategory::create([
            'name' => [
                'uz' => 'Hamrohlik qiluvchi shaxs',
                'ru' => 'Сопровождающее лицо',
                'en' => 'Accompanying Person',
            ],
            'slug' => 'accompanying-person',
            'default' => 'accompanying-person',
        ]);
    }
}
