<?php
namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $translations = [
            [
                'slug'    => 'competitions',
                'name'    => json_encode([
                    'uz' => 'Musobaqalar',
                    'ru' => 'Соревнования',
                    'en' => 'Competitions',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Competitions',
            ],
            [
                'slug'    => 'add',
                'name'    => json_encode([
                    'uz' => "Qo'shish",
                    'ru' => 'Добавить',
                    'en' => 'Add',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Add',
            ],
            [
                'slug'    => 'competition-type',
                'name'    => json_encode([
                    'uz' => "Musobaqaning turi",
                    'ru' => 'Тип соревнования',
                    'en' => 'Competition type',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Competition type',
            ],
            [
                'slug'    => 'country',
                'name'    => json_encode([
                    'uz' => "Mamlakat",
                    'ru' => 'Страна',
                    'en' => 'Country',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Country',
            ],
            [
                'slug'    => 'start-of-registration',
                'name'    => json_encode([
                    'uz' => "Ro'yxatdan o'tish boshlanishi",
                    'ru' => 'Начало регистрации',
                    'en' => 'Start of registration',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Start of registration',
            ],
            [
                'slug'    => 'registration-completed',
                'name'    => json_encode([
                    'uz' => "Roʻyxatdan oʻtish tugallandi",
                    'ru' => 'Оконч регистрации',
                    'en' => 'Registration completed',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Registration completed',
            ],
            [
                'slug'    => 'start',
                'name'    => json_encode([
                    'uz' => "Boshlash",
                    'ru' => 'Начало',
                    'en' => 'Start',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Start',
            ],
            [
                'slug'    => 'finished',
                'name'    => json_encode([
                    'uz' => "Tugallandi",
                    'ru' => 'Оконч',
                    'en' => 'Finished',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Finished',
            ],
            [
                'slug'    => 'status',
                'name'    => json_encode([
                    'uz' => "Status",
                    'ru' => 'Статус',
                    'en' => 'Status',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Status',
            ],
            [
                'slug'    => 'participants',
                'name'    => json_encode([
                    'uz' => "Ishtirokchilar",
                    'ru' => 'Участники',
                    'en' => 'Participants',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Participants',
            ],
            [
                'slug'    => 'function',
                'name'    => json_encode([
                    'uz' => "Funktsiya",
                    'ru' => 'Функции',
                    'en' => 'Functions',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'History',
            ],
            [
                'slug'    => 'history',
                'name'    => json_encode([
                    'uz' => "Tarix",
                    'ru' => 'История',
                    'en' => 'History',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'History',
            ],
            [
                'slug'    => 'name',
                'name'    => json_encode([
                    'uz' => "Ism",
                    'ru' => 'Имя',
                    'en' => 'Name',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Name',
            ],
            [
                'slug'    => 'category',
                'name'    => json_encode([
                    'uz' => "Turkum",
                    'ru' => 'Категория',
                    'en' => 'Category',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Category',
            ],
            [
                'slug'    => 'description',
                'name'    => json_encode([
                    'uz' => "Tavsif",
                    'ru' => 'Описание',
                    'en' => 'Description',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Description',
            ],
            [
                'slug'    => 'logo',
                'name'    => json_encode([
                    'uz' => "Logotip",
                    'ru' => 'Логотип',
                    'en' => 'Logo',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Logo',
            ],
            [
                'slug'    => 'change',
                'name'    => json_encode([
                    'uz' => "O'zgartirish",
                    'ru' => 'Изменить',
                    'en' => 'Change',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Change',
            ],
            [
                'slug'    => 'change',
                'name'    => json_encode([
                    'uz' => "O'zgartirish",
                    'ru' => 'Изменить',
                    'en' => 'Change',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Change',
            ],
            [
                'slug'    => 'delete',
                'name'    => json_encode([
                    'uz' => "Oʻchirish",
                    'ru' => 'Удалить',
                    'en' => 'Delete',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Delete',
            ],
            [
                'slug'    => 'standard',
                'name'    => json_encode([
                    'uz' => "Standart",
                    'ru' => 'Стандартный',
                    'en' => 'Standard',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Standard',
            ],
        ];

        Translation::insert($translations);
    }
}
