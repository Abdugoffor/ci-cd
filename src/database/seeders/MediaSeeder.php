<?php
namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::create([
            'name'        => [
                'uz'      => '46-FIDE Shaxmat Olimpiadasi',
                'ru'      => '46th FIDE CHESS OLYMPIAD',
                'en'      => '46th FIDE CHESS OLYMPIAD',
                'default' => '46th FIDE CHESS OLYMPIAD',
            ],
            'title'       => [
                'uz'      => 'SAMARQAND 2025',
                'ru'      => 'SAMARKAND 2025',
                'en'      => 'SAMARKAND 2025',
                'default' => 'SAMARKAND 2025',
            ],
            'description' => [
                'uz'      => 'Ariza holatini tekshirish',
                'ru'      => 'Проверка статуса заявки',
                'en'      => 'Application Status Check',
                'default' => 'Проверка статуса заявки',
            ],
            'text'        => [
                'uz'      => 'Siz ariza holatini tekshirishingiz mumkin. Buning uchun emailga yuborilgan ariza ID va maxsus kalit (key) ma’lumotlarini kiritishingiz lozim. Shuningdek, ariza holatini yangilash imkoniyati ham mavjud.',
                'ru'      => 'Вы можете проверить статус заявки. Для этого необходимо ввести идентификатор заявки и специальный ключ (key), отправленный на вашу электронную почту. Также есть возможность обновить статус заявки.',
                'en'      => 'You can check the status of your application. To do this, enter the application ID and the special key (key) sent to your email. You also have the option to update the application status.',
                'default' => 'Вы можете проверить статус заявки. Для этого необходимо ввести идентификатор заявки и специальный ключ (key), отправленный на вашу электронную почту. Также есть возможность обновить статус заявки.',
            ],

            'photo_1'     => 'frontend/assets/header_banner/banner-chess.svg',
            'photo_2'     => 'frontend/assets/main/history-image.svg',
        ]);

    }
}
