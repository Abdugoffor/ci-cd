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
        $categories = [
            [
                'name'  => [
                    'uz'      => 'FIDE',
                    'ru'      => 'FIDE',
                    'en'      => 'FIDE',
                    'default' => 'fide',
                ],
                'slug'  => 'fide',
                'color' => '34deg, #29B7D0 -52.14%, #064B5A 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'OAV',
                    'ru'      => 'СМИ',
                    'en'      => 'Media',
                    'default' => 'media',
                ],
                'slug'  => 'media',
                'color' => '224deg, #154567 -32.24%, #2782EB 110.77%',
            ],
            [
                'name'  => [
                    'uz'      => 'Translyatsiya',
                    'ru'      => 'Трансляция',
                    'en'      => 'Broadcast',
                    'default' => 'broadcast',
                ],
                'slug'  => 'broadcast',
                'color' => '34deg, #DF9E82 -52.14%, #A56143 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Tashkiliy qo‘mita',
                    'ru'      => 'Орг. комитет',
                    'en'      => 'Org. Committee',
                    'default' => 'org-committee',
                ],
                'slug'  => 'org-committee',
                'color' => '34deg, #9850C1 -52.14%, #57319E 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Xodimlar',
                    'ru'      => 'Персонал',
                    'en'      => 'Personnel',
                    'default' => 'personnel',
                ],
                'slug'  => 'personnel',
                'color' => '34deg, #349D70 -52.14%, #4B7974 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Ko‘ngilli',
                    'ru'      => 'Волонтёр',
                    'en'      => 'Volunteer',
                    'default' => 'volunteer',
                ],
                'slug'  => 'volunteer',
                'color' => '34deg, #E0BB75 -52.14%, #8F7038 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Boshqaruvchi',
                    'ru'      => 'Арбитр',
                    'en'      => 'Arbiter',
                    'default' => 'arbiter',
                ],
                'slug'  => 'arbiter',
                'color' => '34deg, #989641 -52.14%, #5B6A1B 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Xavfsizlik xizmati',
                    'ru'      => 'Безопасность',
                    'en'      => 'Safety & Security',
                    'default' => 'safety-security',
                ],
                'slug'  => 'safety-security',
                'color' => '34deg, #82959E -52.14%, #4C6068 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'VIP',
                    'ru'      => 'VIP',
                    'en'      => 'VIP',
                    'default' => 'vip',
                ],
                'slug'  => 'vip',
                'color' => '34deg, #DF9582 -52.14%, #7A184A 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Marketing hamkori',
                    'ru'      => 'Маркетинговый партнер',
                    'en'      => 'Marketing Partner',
                    'default' => 'marketing-partner',
                ],
                'slug'  => 'marketing-partner',
                'color' => '34deg, #3F8AC2 -52.14%, #0B4C58 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Mehmonxona xizmati',
                    'ru'      => 'Гостеприимство',
                    'en'      => 'Hospitality',
                    'default' => 'hospitality',
                ],
                'slug'  => 'hospitality',
                'color' => '34deg, rgba(125, 175, 199, 0.51) -52.14%, rgba(118, 174, 197, 0.38) 142.1%',
            ],
            [
                'name'  => [
                    'uz'      => 'Hamrohlik qiluvchi shaxs',
                    'ru'      => 'Сопровождающее лицо',
                    'en'      => 'Accompanying Person',
                    'default' => 'accompanying-person',
                ],
                'slug'  => 'accompanying-person',
                'color' => '34deg, #6FA489 -52.14%, #153B44 142.1%',
            ],
        ];

        foreach ($categories as $category) {
            AccreditationCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

    }
}
