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
                'uz'      => 'Strategiya Tarix bilan uchrashadi',
                'ru'      => 'Стратегия Встречает Историю',
                'en'      => 'Strategy Meets History',
                'default' => 'Стратегия Встречает Историю',
            ],
            'text'        => [
                'uz'      => 'Bu tadbir tarixiy shahar Samarqandda o‘tkazilib, strategiya, madaniyat va global birdamlikni unutilmas uyg‘unlashuvini yaratadi.',
                'ru'      => 'Это мероприятие, проходящее в историческом городе Самарканд, станет незабываемым слиянием стратегии, культуры и глобального единства.',
                'en'      => 'This event, held in the historic city of Samarkand, will be an unforgettable blend of strategy, culture, and global unity.',
                'default' => 'Это мероприятие, проходящее в историческом городе Самарканд, станет незабываемым слиянием стратегии, культуры и глобального единства.',
            ],
            'photo_1' => 'client/assets/header_banner/banner-chess.svg',
            'photo_2' => 'client/assets/main/history-image.svg',
        ]);

    }
}
