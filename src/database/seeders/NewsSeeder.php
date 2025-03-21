<?php
namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title'       => [
                    'uz'      => 'Olimpiada 2025 boshlandi',
                    'ru'      => 'Олимпиада 2025 началась',
                    'en'      => 'Olympiad 2025 has started',
                    'default' => 'Olympiad 2025 has started',
                ],
                'description' => [
                    'uz'      => 'Toshkentda xalqaro olimpiada o‘yinlari boshlandi',
                    'ru'      => 'В Ташкенте начались международные олимпийские игры',
                    'en'      => 'International Olympic Games started in Tashkent',
                    'default' => 'International Olympic Games started in Tashkent',
                ],
                'text'        => [
                    'uz'      => 'Bugun Toshkentda dunyoning turli mamlakatlaridan kelgan sportchilar ishtirokida Olimpiada 2025 rasman ochildi.',
                    'ru'      => 'Сегодня в Ташкенте официально открылась Олимпиада 2025 с участием спортсменов из разных стран мира.',
                    'en'      => 'Today, Olympiad 2025 was officially opened in Tashkent with athletes from various countries around the world.',
                    'default' => 'Today, Olympiad 2025 was officially opened in Tashkent with athletes from various countries around the world.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Yangi stadion ochildi',
                    'ru'      => 'Открыт новый стадион',
                    'en'      => 'New stadium opened',
                    'default' => 'New stadium opened',
                ],
                'description' => [
                    'uz'      => 'Samarqandda zamonaviy stadion foydalanishga topshirildi',
                    'ru'      => 'В Самарканде введён в эксплуатацию современный стадион',
                    'en'      => 'A modern stadium has been commissioned in Samarkand',
                    'default' => 'A modern stadium has been commissioned in Samarkand',
                ],
                'text'        => [
                    'uz'      => 'Samarqand shahrida 50 ming kishilik yangi stadion ochildi, unda xalqaro musobaqalar o‘tkaziladi.',
                    'ru'      => 'В Самарканде открыт новый стадион на 50 тысяч мест, где будут проводиться международные соревнования.',
                    'en'      => 'A new 50,000-seat stadium was opened in Samarkand, where international competitions will be held.',
                    'default' => 'A new 50,000-seat stadium was opened in Samarkand, where international competitions will be held.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Buxoroda festival',
                    'ru'      => 'Фестиваль в Бухаре',
                    'en'      => 'Festival in Bukhara',
                    'default' => 'Festival in Bukhara',
                ],
                'description' => [
                    'uz'      => 'Buxoroda an’anaviy madaniyat festivali bo‘lib o‘tdi',
                    'ru'      => 'В Бухаре прошёл традиционный фестиваль культуры',
                    'en'      => 'A traditional culture festival took place in Bukhara',
                    'default' => 'A traditional culture festival took place in Bukhara',
                ],
                'text'        => [
                    'uz'      => 'Buxoro shahrida o‘tkazilgan festivalda mahalliy va xorijiy san’atkorlar ishtirok etdi.',
                    'ru'      => 'В фестивале, прошедшем в Бухаре, приняли участие местные и зарубежные артисты.',
                    'en'      => 'The festival held in Bukhara featured local and international artists.',
                    'default' => 'The festival held in Bukhara featured local and international artists.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Xiva san’at kechasi',
                    'ru'      => 'Ночь искусств в Хиве',
                    'en'      => 'Art Night in Khiva',
                    'default' => 'Art Night in Khiva',
                ],
                'description' => [
                    'uz'      => 'Xiva shahrida san’at kechasi tashkil etildi',
                    'ru'      => 'В Хиве организована ночь искусств',
                    'en'      => 'An art night was organized in Khiva',
                    'default' => 'An art night was organized in Khiva',
                ],
                'text'        => [
                    'uz'      => 'Xiva shahridagi Ichan-Qal’ada san’at kechasi bo‘lib, unda musiqiy va raqs chiqishlari namoyish etildi.',
                    'ru'      => 'В Ичан-Кале в Хиве прошла ночь искусств с музыкальными и танцевальными выступлениями.',
                    'en'      => 'An art night took place in Khiva’s Ichan-Qala, featuring music and dance performances.',
                    'default' => 'An art night took place in Khiva’s Ichan-Qala, featuring music and dance performances.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Toshkent marafoni',
                    'ru'      => 'Ташкентский марафон',
                    'en'      => 'Tashkent Marathon',
                    'default' => 'Tashkent Marathon',
                ],
                'description' => [
                    'uz'      => 'Toshkentda yillik marafon musobaqasi bo‘lib o‘tdi',
                    'ru'      => 'В Ташкенте прошёл ежегодный марафон',
                    'en'      => 'The annual marathon took place in Tashkent',
                    'default' => 'The annual marathon took place in Tashkent',
                ],
                'text'        => [
                    'uz'      => 'Toshkent shahrida minglab ishtirokchilar qatnashgan marafon muvaffaqiyatli yakunlandi.',
                    'ru'      => 'Марафон в Ташкенте с участием тысяч бегунов успешно завершился.',
                    'en'      => 'The Tashkent marathon with thousands of participants concluded successfully.',
                    'default' => 'The Tashkent marathon with thousands of participants concluded successfully.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Farg‘ona yarmarkasi',
                    'ru'      => 'Ферганская ярмарка',
                    'en'      => 'Fergana Fair',
                    'default' => 'Fergana Fair',
                ],
                'description' => [
                    'uz'      => 'Farg‘onada mahalliy mahsulotlar yarmarkasi o‘tkazildi',
                    'ru'      => 'В Фергане прошла ярмарка местных продуктов',
                    'en'      => 'A local products fair was held in Fergana',
                    'default' => 'A local products fair was held in Fergana',
                ],
                'text'        => [
                    'uz'      => 'Farg‘ona shahrida o‘tkazilgan yarmarkada hunarmandchilik va oziq-ovqat mahsulotlari taqdim etildi.',
                    'ru'      => 'На ярмарке в Фергане были представлены изделия ремесленников и продукты питания.',
                    'en'      => 'The fair in Fergana showcased handicrafts and food products.',
                    'default' => 'The fair in Fergana showcased handicrafts and food products.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Andijon sport yangiliklari',
                    'ru'      => 'Спортивные новости Андижана',
                    'en'      => 'Andijan Sports News',
                    'default' => 'Andijan Sports News',
                ],
                'description' => [
                    'uz'      => 'Andijonda sport musobaqalari haqida yangilik',
                    'ru'      => 'Новости о спортивных соревнованиях в Андижане',
                    'en'      => 'News about sports competitions in Andijan',
                    'default' => 'News about sports competitions in Andijan',
                ],
                'text'        => [
                    'uz'      => 'Andijon shahrida o‘tkazilgan musobaqada mahalliy jamoalar g‘oliblikni qo‘lga kiritdi.',
                    'ru'      => 'На соревновании в Андижане местные команды одержали победу.',
                    'en'      => 'Local teams won at the competition held in Andijan.',
                    'default' => 'Local teams won at the competition held in Andijan.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Namangan konserti',
                    'ru'      => 'Концерт в Намангане',
                    'en'      => 'Namangan Concert',
                    'default' => 'Namangan Concert',
                ],
                'description' => [
                    'uz'      => 'Namanganda mashhur san’atkorlar konserti bo‘lib o‘tdi',
                    'ru'      => 'В Намангане прошёл концерт известных артистов',
                    'en'      => 'A concert of famous artists took place in Namangan',
                    'default' => 'A concert of famous artists took place in Namangan',
                ],
                'text'        => [
                    'uz'      => 'Namangan shahridagi konsertda mahalliy va xorijiy yulduzlar chiqish qildi.',
                    'ru'      => 'На концерте в Намангане выступили местные и зарубежные звёзды.',
                    'en'      => 'The concert in Namangan featured local and international stars.',
                    'default' => 'The concert in Namangan featured local and international stars.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Qarshi ko‘rgazmasi',
                    'ru'      => 'Выставка в Карши',
                    'en'      => 'Karshi Exhibition',
                    'default' => 'Karshi Exhibition',
                ],
                'description' => [
                    'uz'      => 'Qarshida san’at ko‘rgazmasi ochildi',
                    'ru'      => 'В Карши открылась художественная выставка',
                    'en'      => 'An art exhibition opened in Karshi',
                    'default' => 'An art exhibition opened in Karshi',
                ],
                'text'        => [
                    'uz'      => 'Qarshi shahridagi ko‘rgazmada mahalliy rassomlarning asarlari namoyish etildi.',
                    'ru'      => 'На выставке в Карши были представлены работы местных художников.',
                    'en'      => 'The exhibition in Karshi showcased works by local artists.',
                    'default' => 'The exhibition in Karshi showcased works by local artists.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
            [
                'title'       => [
                    'uz'      => 'Termiz arxeologiya yangiliklari',
                    'ru'      => 'Археологические новости Термеза',
                    'en'      => 'Termez Archaeology News',
                    'default' => 'Termez Archaeology News',
                ],
                'description' => [
                    'uz'      => 'Termizda yangi arxeologik topilmalar haqida xabar',
                    'ru'      => 'Новости о новых археологических находках в Термезе',
                    'en'      => 'News about new archaeological discoveries in Termez',
                    'default' => 'News about new archaeological discoveries in Termez',
                ],
                'text'        => [
                    'uz'      => 'Termiz yaqinidagi qazishmalar davomida qadimiy artefaktlar topildi.',
                    'ru'      => 'В ходе раскопок близ Термеза были найдены древние артефакты.',
                    'en'      => 'Ancient artifacts were discovered during excavations near Termez.',
                    'default' => 'Ancient artifacts were discovered during excavations near Termez.',
                ],
                'menyu_id'    => 1,
                'photo'       => 'frontend/assets/news/detail1.svg',
                'is_active'   => true,
            ],
        ];
        foreach ($news as $new) {
            News::create($new);
        }
    }
}
