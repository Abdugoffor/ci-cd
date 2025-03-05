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
                'default' => 'Funktsiya',
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
                    'uz' => "Musobaqa Turkumi",
                    'ru' => 'Категория соревнования',
                    'en' => 'Competition category',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Competition category',
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
            [
                'slug'    => 'type',
                'name'    => json_encode([
                    'uz' => "Turi",
                    'ru' => 'Тип',
                    'en' => 'Type',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Type',
            ],
            [
                'slug'    => 'applications',
                'name'    => json_encode([
                    'uz' => "Arizalar",
                    'ru' => 'Заявки',
                    'en' => 'Applications',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Applications',
            ],
            [
                'slug'    => 'birth-date',
                'name'    => json_encode([
                    'uz' => "Tug'ilgan sana",
                    'ru' => 'Дата рождения',
                    'en' => 'Birth date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Birth date',
            ],
            [
                'slug'    => 'gender',
                'name'    => json_encode([
                    'uz' => 'Jinsi',
                    'ru' => 'Пол',
                    'en' => 'Gender',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Gender',
            ],
            [
                'slug'    => 'email',
                'name'    => json_encode([
                    'uz' => 'Elektron pochta',
                    'ru' => 'Почта',
                    'en' => 'Email',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Email',
            ],
            [
                'slug'    => 'visa-required',
                'name'    => json_encode([
                    'uz' => 'Viza talab qilinadi',
                    'ru' => 'Требуется виза',
                    'en' => 'Visa required',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Visa required',
            ],
            [
                'slug'    => 'registration-end',
                'name'    => json_encode([
                    'uz' => "Ro'yxatdan o'tish tugash sanasi",
                    'ru' => 'Оконч регистрации',
                    'en' => 'Registration end',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Registration end',
            ],
            [
                'slug'    => 'arrival-date',
                'name'    => json_encode([
                    'uz' => 'Kelish sanasi',
                    'ru' => 'Дата прибытия',
                    'en' => 'Arrival date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Arrival date',
            ],
            [
                'slug'    => 'departure-date',
                'name'    => json_encode([
                    'uz' => 'Jo‘nab ketish sanasi',
                    'ru' => 'Дата отъезда',
                    'en' => 'Departure date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Departure date',
            ],
            [
                'slug'    => 'view',
                'name'    => json_encode([
                    'uz' => 'Ko‘rish',
                    'ru' => 'Посмотреть',
                    'en' => 'View',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'View',
            ],
            [
                'slug'    => 'application',
                'name'    => json_encode([
                    'uz' => 'Ariza',
                    'ru' => 'Заявка',
                    'en' => 'Application',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Application',
            ],
            [
                'slug'    => 'last-name',
                'name'    => json_encode([
                    'uz' => 'Familiya',
                    'ru' => 'Фамилия',
                    'en' => 'Last name',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Last name',
            ],
            [
                'slug'    => 'email-confirmed',
                'name'    => json_encode([
                    'uz' => 'Email tasdiqlandi',
                    'ru' => 'Email подтвержден',
                    'en' => 'Email confirmed',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Email confirmed',
            ],
            [
                'slug'    => 'fide-id',
                'name'    => json_encode([
                    'uz' => 'FIDE ID',
                    'ru' => 'FIDE ID',
                    'en' => 'FIDE ID',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'FIDE ID',
            ],
            [
                'slug'    => 'accreditation-category',
                'name'    => json_encode([
                    'uz' => 'Akkreditatsiya toifasi',
                    'ru' => 'Категория аккредитации',
                    'en' => 'Accreditation category',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Accreditation category',
            ],
            [
                'slug'    => 'citizenship',
                'name'    => json_encode([
                    'uz' => 'Fuqarolik',
                    'ru' => 'Гражданство',
                    'en' => 'Citizenship',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Citizenship',
            ],
            [
                'slug'    => 'passport-number',
                'name'    => json_encode([
                    'uz' => 'Pasport raqami',
                    'ru' => 'Номер паспорта',
                    'en' => 'Passport number',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport number',
            ],
            [
                'slug'    => 'passport-issue-date',
                'name'    => json_encode([
                    'uz' => 'Pasport berilgan sana',
                    'ru' => 'Дата выдачи паспорта',
                    'en' => 'Passport issue date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport issue date',
            ],
            [
                'slug'    => 'passport-validity-period',
                'name'    => json_encode([
                    'uz' => 'Pasportning amal qilish muddati',
                    'ru' => 'Срок действия паспорта',
                    'en' => 'Passport validity period',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport validity period',
            ],
            [
                'slug'    => 'passport-issuing-authority',
                'name'    => json_encode([
                    'uz' => 'Pasport beruvchi organ',
                    'ru' => 'Орган выдачи паспорта',
                    'en' => 'Passport issuing authority',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport issuing authority',
            ],
            [
                'slug'    => 'copy-of-passport',
                'name'    => json_encode([
                    'uz' => 'Pasport beruvchi organ',
                    'ru' => 'Копия паспорта',
                    'en' => 'Copy of passport',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Copy of passport',
            ],
            [
                'slug'    => 'no-data',
                'name'    => json_encode([
                    'uz' => 'Maʼlumot yoʻq',
                    'ru' => 'Нет данных',
                    'en' => 'No data',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'No data',
            ],
            [
                'slug'    => 'phone',
                'name'    => json_encode([
                    'uz' => 'Telefon',
                    'ru' => 'Телефон',
                    'en' => 'Phone',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Phone',
            ],
            [
                'slug'    => 'photo',
                'name'    => json_encode([
                    'uz' => 'Fotosurat',
                    'ru' => 'Фото',
                    'en' => 'Photo',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Photo',
            ],
            [
                'slug'    => 'no-photo',
                'name'    => json_encode([
                    'uz' => 'Fotosurat yo‘q',
                    'ru' => 'Фото отсутствует',
                    'en' => 'No photo',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'No photo',
            ],
            [
                'slug'    => 'visa-required',
                'name'    => json_encode([
                    'uz' => 'Viza talab qilinadi',
                    'ru' => 'Виза требуется',
                    'en' => 'Visa required',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Visa required',
            ],
            [
                'slug'    => 'yes',
                'name'    => json_encode([
                    'uz' => 'Ha',
                    'ru' => 'Да',
                    'en' => 'Yes',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Yes',
            ],
            [
                'slug'    => 'no',
                'name'    => json_encode([
                    'uz' => 'Yo‘q',
                    'ru' => 'Нет',
                    'en' => 'No',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'No',
            ],
            [
                'slug'    => 'arrival-date',
                'name'    => json_encode([
                    'uz' => 'Kelish sanasi',
                    'ru' => 'Дата прибытия',
                    'en' => 'Arrival date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Arrival date',
            ],
            [
                'slug'    => 'departure-date',
                'name'    => json_encode([
                    'uz' => 'Jo‘nab ketish sanasi',
                    'ru' => 'Дата отъезда',
                    'en' => 'Departure date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Departure date',
            ],
            [
                'slug'    => 'accommodation-details',
                'name'    => json_encode([
                    'uz' => 'Yashash joyi tafsilotlari',
                    'ru' => 'Детали проживания',
                    'en' => 'Accommodation details',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Accommodation details',
            ],
            [
                'slug'    => 'pcr-test-details',
                'name'    => json_encode([
                    'uz' => 'PCR test tafsilotlari',
                    'ru' => 'Детали ПЦР-теста',
                    'en' => 'PCR test details',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'PCR test details',
            ],
            [
                'slug'    => 'reason-for-cancellation',
                'name'    => json_encode([
                    'uz' => 'Bekor qilish sababi',
                    'ru' => 'Причина отмены',
                    'en' => 'Reason for cancellation',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Reason for cancellation',
            ],
            [
                'slug'    => 'close',
                'name'    => json_encode([
                    'uz' => 'Yopish',
                    'ru' => 'Закрыть',
                    'en' => 'Close',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Close',
            ],
            [
                'slug'    => 'confirm',
                'name'    => json_encode([
                    'uz' => 'Tasdiqlash',
                    'ru' => 'Подтвердить',
                    'en' => 'Confirm',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Confirm',
            ],
            [
                'slug'    => 'acceptance',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Принятие',
                    'en' => 'Acceptance',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Acceptance',
            ],
            [
                'slug'    => 'canceled',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Отменено',
                    'en' => 'Canceled',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Canceled',
            ],
            // test
            [
                'slug'    => 'role',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Роль',
                    'en' => 'Role',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Role',
            ],
            [
                'slug'    => 'users',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Пользователи',
                    'en' => 'Users',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Users',
            ],
            [
                'slug'    => 'do-you-want-to-delete',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Хотите удалить',
                    'en' => 'Do you want to delete',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Do you want to delete',
            ],
            [
                'slug'    => 'assets',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'актив',
                    'en' => 'assets',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'assets',
            ],
            [
                'slug'    => 'not-active',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'не активен',
                    'en' => 'not active',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'not active',
            ],
            [
                'slug'    => 'password',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Пароль',
                    'en' => 'password',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'password',
            ],
            [
                'slug'    => 'password_conf',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Пароль подтвержденный',
                    'en' => 'Password conf',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Password conf',
            ],
            [
                'slug'    => 'language',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Языки',
                    'en' => 'Language',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Language',
            ],
            [
                'slug'    => 'translations',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Переводы',
                    'en' => 'Translations',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Translations',
            ],
            [
                'slug'    => 'standard',
                'name'    => json_encode([
                    'uz' => 'Qabul qilish',
                    'ru' => 'Стандартный',
                    'en' => 'Standard',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Standard',
            ],
            [
                'slug'    => 'hotels',
                'name'    => json_encode([
                    'uz' => 'Mehmonxonalar',
                    'ru' => 'Отели',
                    'en' => 'Hotels',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'hotels',
            ],
            [
                'slug'    => 'contacts',
                'name'    => json_encode([
                    'uz' => 'Aloqalar',
                    'ru' => 'Контакты',
                    'en' => 'Contacts',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'contacts',
            ],
            [
                'slug'    => 'path',
                'name'    => json_encode([
                    'uz' => 'Yo‘l',
                    'ru' => 'Путь',
                    'en' => 'Path',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Yo‘l',
            ],
            [
                'slug'    => 'Title',
                'name'    => json_encode([
                    'uz' => 'Sarlavha',
                    'ru' => 'Заголовок',
                    'en' => 'Title',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Sarlavha',
            ],
            [
                'slug'    => 'text',
                'name'    => json_encode([
                    'uz' => 'Matn',
                    'ru' => 'Текст',
                    'en' => 'Text',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Text',
            ],
            [
                'slug'    => 'rating',
                'name'    => json_encode([
                    'uz' => 'rating',
                    'ru' => 'rating',
                    'en' => 'rating',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'rating',
            ],
            [
                'slug'    => 'location',
                'name'    => json_encode([
                    'uz' => 'location',
                    'ru' => 'location',
                    'en' => 'location',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'location',
            ],
            [
                'slug'    => 'news',
                'name'    => json_encode([
                    'uz' => 'Sahifalar',
                    'ru' => 'Страницы',
                    'en' => 'Pages',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Pages',
            ],

            [
                'slug'    => 'accreditation-categories',
                'name'    => json_encode([
                    'uz' => 'Akkreditatsiya toifalari',
                    'ru' => 'Категории аккредитации',
                    'en' => 'Accreditation categories',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'accreditation-categories',
            ],
            [
                'slug'    => 'search',
                'name'    => json_encode([
                    'uz' => 'search',
                    'ru' => 'поиск',
                    'en' => 'search',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'search',
            ],
            [
                'slug'    => 'M',
                'name'    => json_encode([
                    'uz' => 'Мужчина',
                    'ru' => 'Мужчина',
                    'en' => 'Мужчина',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Мужчина',
            ],
            [
                'slug'    => 'L',
                'name'    => json_encode([
                    'uz' => 'Женщина',
                    'ru' => 'Женщина',
                    'en' => 'Женщина',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Женщина',
            ],
            [
                'slug'    => 'pending',
                'name'    => json_encode([
                    'uz' => 'Kutilmoqda',
                    'ru' => 'Ожидается',
                    'en' => 'Pending',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Pending',
            ],
            [
                'slug'    => 'ongoing',
                'name'    => json_encode([
                    'uz' => 'Davom etmoqda',
                    'ru' => 'В процессе',
                    'en' => 'Ongoing',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'ongoing',
            ],
            [
                'slug'    => 'approved',
                'name'    => json_encode([
                    'uz' => 'Tasdiqlangan',
                    'ru' => 'Подтверждено',
                    'en' => 'Approved',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Approved',
            ],
            [
                'slug'    => 'canceled',
                'name'    => json_encode([
                    'uz' => 'Bekor qilingan',
                    'ru' => 'Отменено',
                    'en' => 'Canceled',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Canceled',
            ],
            [
                'slug'    => 'completed',
                'name'    => json_encode([
                    'uz' => 'yakunlandi',
                    'ru' => 'завершенный',
                    'en' => 'completed',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'completed',
            ],
            [
                'slug'    => 'logout',
                'name'    => json_encode([
                    'uz' => 'Chiqish',
                    'ru' => 'Выход',
                    'en' => 'Logout',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'logout',
            ],
            [
                'slug'    => 'menus',
                'name'    => json_encode([
                    'uz' => 'Menyular',
                    'ru' => 'Меню',
                    'en' => 'Menus',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Menus',
            ],
            [
                'slug'    => 'partners',
                'name'    => json_encode([
                    'uz' => 'Hamkorlar',
                    'ru' => 'Партнёры',
                    'en' => 'Partners',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Partners',
            ],
            [
                'slug'    => 'my_profile',
                'name'    => json_encode([
                    'uz' => 'Mening profilim',
                    'ru' => 'Мой профиль',
                    'en' => 'My profile',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'My profile',
            ],

        ];

        Translation::insert($translations);
        // try {
        //     Translation::insert($translations);
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
