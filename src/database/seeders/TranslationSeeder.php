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
                    'uz' => "Musobaqa turi",
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
                    'uz' => "Ro'yxatdan o'tish yakunlandi",
                    'ru' => 'Регистрация завершена',
                    'en' => 'Registration completed',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Registration completed',
            ],
            [
                'slug'    => 'start',
                'name'    => json_encode([
                    'uz' => "Boshlash",
                    'ru' => 'Начать',
                    'en' => 'Start',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Start',
            ],
            [
                'slug'    => 'finished',
                'name'    => json_encode([
                    'uz' => "Tugallandi",
                    'ru' => 'Завершено',
                    'en' => 'Finished',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Finished',
            ],
            [
                'slug'    => 'status',
                'name'    => json_encode([
                    'uz' => "Holati",
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
                    'ru' => 'Функция',
                    'en' => 'Function',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Function', // Corrected 'Funktsiya' to 'Function' to match English
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
                    'uz' => "Kategoriya",
                    'ru' => 'Категория',
                    'en' => 'Category',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Category', // Adjusted to be more general instead of 'Competition category'
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
                    'uz' => "O'chirish",
                    'ru' => 'Удалить',
                    'en' => 'Delete',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Delete',
            ],
            [
                'slug'    => 'standard',
                'name'    => json_encode([
                    'uz' => "Standart",
                    'ru' => 'Стандарт',
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
                    'uz' => "Jins",
                    'ru' => 'Пол',
                    'en' => 'Gender',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Gender',
            ],
            [
                'slug'    => 'email',
                'name'    => json_encode([
                    'uz' => "Elektron pochta",
                    'ru' => 'Электронная почта',
                    'en' => 'Email',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Email',
            ],
            [
                'slug'    => 'visa-required',
                'name'    => json_encode([
                    'uz' => "Viza talab qilinadi",
                    'ru' => 'Требуется виза',
                    'en' => 'Visa required',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Visa required',
            ],
            [
                'slug'    => 'registration-end',
                'name'    => json_encode([
                    'uz' => "Ro'yxatdan o'tish tugash sanasi",
                    'ru' => 'Дата окончания регистрации',
                    'en' => 'Registration end',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Registration end',
            ],
            [
                'slug'    => 'arrival-date',
                'name'    => json_encode([
                    'uz' => "Kelish sanasi",
                    'ru' => 'Дата прибытия',
                    'en' => 'Arrival date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Arrival date',
            ],
            [
                'slug'    => 'departure-date',
                'name'    => json_encode([
                    'uz' => "Jo'nash sanasi",
                    'ru' => 'Дата отъезда',
                    'en' => 'Departure date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Departure date',
            ],
            [
                'slug'    => 'view',
                'name'    => json_encode([
                    'uz' => "Ko'rish",
                    'ru' => 'Просмотр',
                    'en' => 'View',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'View',
            ],
            [
                'slug'    => 'application',
                'name'    => json_encode([
                    'uz' => "Ariza",
                    'ru' => 'Заявка',
                    'en' => 'Application',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Application',
            ],
            [
                'slug'    => 'last-name',
                'name'    => json_encode([
                    'uz' => "Familiya",
                    'ru' => 'Фамилия',
                    'en' => 'Last name',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Last name',
            ],
            [
                'slug'    => 'email-confirmed',
                'name'    => json_encode([
                    'uz' => "Elektron pochta tasdiqlandi",
                    'ru' => 'Электронная почта подтверждена',
                    'en' => 'Email confirmed',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Email confirmed',
            ],
            [
                'slug'    => 'fide-id',
                'name'    => json_encode([
                    'uz' => "FIDE ID",
                    'ru' => 'FIDE ID',
                    'en' => 'FIDE ID',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'FIDE ID',
            ],
            [
                'slug'    => 'accreditation-category',
                'name'    => json_encode([
                    'uz' => "Akkreditatsiya kategoriyasi",
                    'ru' => 'Категория аккредитации',
                    'en' => 'Accreditation category',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Accreditation category',
            ],
            [
                'slug'    => 'citizenship',
                'name'    => json_encode([
                    'uz' => "Fuqarolik",
                    'ru' => 'Гражданство',
                    'en' => 'Citizenship',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Citizenship',
            ],
            [
                'slug'    => 'passport-number',
                'name'    => json_encode([
                    'uz' => "Pasport raqami",
                    'ru' => 'Номер паспорта',
                    'en' => 'Passport number',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport number',
            ],
            [
                'slug'    => 'passport-issue-date',
                'name'    => json_encode([
                    'uz' => "Pasport berilgan sana",
                    'ru' => 'Дата выдачи паспорта',
                    'en' => 'Passport issue date',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport issue date',
            ],
            [
                'slug'    => 'passport-validity-period',
                'name'    => json_encode([
                    'uz' => "Pasportning amal qilish muddati",
                    'ru' => 'Срок действия паспорта',
                    'en' => 'Passport validity period',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport validity period',
            ],
            [
                'slug'    => 'passport-issuing-authority',
                'name'    => json_encode([
                    'uz' => "Pasport beruvchi organ",
                    'ru' => 'Орган выдачи паспорта',
                    'en' => 'Passport issuing authority',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Passport issuing authority',
            ],
            [
                'slug'    => 'copy-of-passport',
                'name'    => json_encode([
                    'uz' => "Pasport nusxasi",
                    'ru' => 'Копия паспорта',
                    'en' => 'Copy of passport',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Copy of passport', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'no-data',
                'name'    => json_encode([
                    'uz' => "Ma'lumot yo'q",
                    'ru' => 'Нет данных',
                    'en' => 'No data',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'No data',
            ],
            [
                'slug'    => 'phone',
                'name'    => json_encode([
                    'uz' => "Telefon",
                    'ru' => 'Телефон',
                    'en' => 'Phone',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Phone',
            ],
            [
                'slug'    => 'photo',
                'name'    => json_encode([
                    'uz' => "Fotosurat",
                    'ru' => 'Фотография',
                    'en' => 'Photo',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Photo',
            ],
            [
                'slug'    => 'no-photo',
                'name'    => json_encode([
                    'uz' => "Fotosurat yo'q",
                    'ru' => 'Нет фотографии',
                    'en' => 'No photo',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'No photo',
            ],
            [
                'slug'    => 'yes',
                'name'    => json_encode([
                    'uz' => "Ha",
                    'ru' => 'Да',
                    'en' => 'Yes',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Yes',
            ],
            [
                'slug'    => 'no',
                'name'    => json_encode([
                    'uz' => "Yo'q",
                    'ru' => 'Нет',
                    'en' => 'No',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'No',
            ],
            [
                'slug'    => 'accommodation-details',
                'name'    => json_encode([
                    'uz' => "Yashash joyi tafsilotlari",
                    'ru' => 'Детали проживания',
                    'en' => 'Accommodation details',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Accommodation details',
            ],
            [
                'slug'    => 'pcr-test-details',
                'name'    => json_encode([
                    'uz' => "PCR test tafsilotlari",
                    'ru' => 'Детали ПЦР-теста',
                    'en' => 'PCR test details',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'PCR test details',
            ],
            [
                'slug'    => 'reason-for-cancellation',
                'name'    => json_encode([
                    'uz' => "Bekor qilish sababi",
                    'ru' => 'Причина отмены',
                    'en' => 'Reason for cancellation',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Reason for cancellation',
            ],
            [
                'slug'    => 'close',
                'name'    => json_encode([
                    'uz' => "Yopish",
                    'ru' => 'Закрыть',
                    'en' => 'Close',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Close',
            ],
            [
                'slug'    => 'confirm',
                'name'    => json_encode([
                    'uz' => "Tasdiqlash",
                    'ru' => 'Подтвердить',
                    'en' => 'Confirm',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Confirm',
            ],
            [
                'slug'    => 'acceptance',
                'name'    => json_encode([
                    'uz' => "Qabul qilish",
                    'ru' => 'Принятие',
                    'en' => 'Acceptance',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Acceptance',
            ],
            [
                'slug'    => 'canceled',
                'name'    => json_encode([
                    'uz' => "Bekor qilingan",
                    'ru' => 'Отменено',
                    'en' => 'Canceled',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Canceled', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'role',
                'name'    => json_encode([
                    'uz' => "Rol",
                    'ru' => 'Роль',
                    'en' => 'Role',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Role', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'users',
                'name'    => json_encode([
                    'uz' => "Foydalanuvchilar",
                    'ru' => 'Пользователи',
                    'en' => 'Users',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Users', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'do-you-want-to-delete',
                'name'    => json_encode([
                    'uz' => "O'chirishni xohlaysizmi?",
                    'ru' => 'Хотите удалить?',
                    'en' => 'Do you want to delete?',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Do you want to delete?', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'assets',
                'name'    => json_encode([
                    'uz' => "Aktivlar",
                    'ru' => 'Активы',
                    'en' => 'Assets',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Assets', // Fixed incorrect translations
            ],
            [
                'slug'    => 'not-active',
                'name'    => json_encode([
                    'uz' => "Faol emas",
                    'ru' => 'Не активен',
                    'en' => 'Not active',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Not active', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'password',
                'name'    => json_encode([
                    'uz' => "Parol",
                    'ru' => 'Пароль',
                    'en' => 'Password',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Password', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'password_conf',
                'name'    => json_encode([
                    'uz' => "Parolni tasdiqlash",
                    'ru' => 'Подтверждение пароля',
                    'en' => 'Password confirmation',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Password confirmation', // Fixed incorrect translations
            ],
            [
                'slug'    => 'language',
                'name'    => json_encode([
                    'uz' => "Til",
                    'ru' => 'Язык',
                    'en' => 'Language',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Language', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'translations',
                'name'    => json_encode([
                    'uz' => "Tarjimalar",
                    'ru' => 'Переводы',
                    'en' => 'Translations',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Translations', // Fixed incorrect Uzbek translation
            ],
            [
                'slug'    => 'hotels',
                'name'    => json_encode([
                    'uz' => "Mehmonxonalar",
                    'ru' => 'Отели',
                    'en' => 'Hotels',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Hotels', // Fixed case to match English standard
            ],
            [
                'slug'    => 'contacts',
                'name'    => json_encode([
                    'uz' => "Aloqalar",
                    'ru' => 'Контакты',
                    'en' => 'Contacts',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Contacts', // Fixed case to match English standard
            ],
            [
                'slug'    => 'path',
                'name'    => json_encode([
                    'uz' => "Yo'l",
                    'ru' => 'Путь',
                    'en' => 'Path',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Path', // Fixed default to match English
            ],
            [
                'slug'    => 'title',
                'name'    => json_encode([
                    'uz' => "Sarlavha",
                    'ru' => 'Заголовок',
                    'en' => 'Title',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Title', // Fixed default to match English
            ],
            [
                'slug'    => 'text',
                'name'    => json_encode([
                    'uz' => "Matn",
                    'ru' => 'Текст',
                    'en' => 'Text',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Text',
            ],
            [
                'slug'    => 'rating',
                'name'    => json_encode([
                    'uz' => "Reyting",
                    'ru' => 'Рейтинг',
                    'en' => 'Rating',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Rating', // Fixed incorrect translations
            ],
            [
                'slug'    => 'location',
                'name'    => json_encode([
                    'uz' => "Manzil",
                    'ru' => 'Местоположение',
                    'en' => 'Location',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Location', // Fixed incorrect translations
            ],
            [
                'slug'    => 'news',
                'name'    => json_encode([
                    'uz' => "Yangiliklar",
                    'ru' => 'Новости',
                    'en' => 'News',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'News', // Adjusted to match slug 'news' instead of 'Pages'
            ],
            [
                'slug'    => 'accreditation-categories',
                'name'    => json_encode([
                    'uz' => "Akkreditatsiya kategoriyalari",
                    'ru' => 'Категории аккредитации',
                    'en' => 'Accreditation categories',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Accreditation categories', // Fixed default to match English
            ],
            [
                'slug'    => 'search',
                'name'    => json_encode([
                    'uz' => "Qidirish",
                    'ru' => 'Поиск',
                    'en' => 'Search',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Search', // Fixed incorrect translations
            ],
            [
                'slug'    => 'M',
                'name'    => json_encode([
                    'uz' => "Erkak",
                    'ru' => 'Мужчина',
                    'en' => 'Male',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Male', // Fixed incorrect translations
            ],
            [
                'slug'    => 'L',
                'name'    => json_encode([
                    'uz' => "Ayol",
                    'ru' => 'Женщина',
                    'en' => 'Female',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Female', // Fixed incorrect translations
            ],
            [
                'slug'    => 'unfinished',
                'name'    => json_encode([
                    'uz' => "Tugallanmagan",
                    'ru' => 'Незаконченный',
                    'en' => 'Unfinished',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Unfinished',
            ],
            [
                'slug'    => 'pending',
                'name'    => json_encode([
                    'uz' => "Kutilmoqda",
                    'ru' => 'Ожидающий',
                    'en' => 'Pending',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Pending',
            ],
            [
                'slug'    => 'ongoing',
                'name'    => json_encode([
                    'uz' => "Davom etmoqda",
                    'ru' => 'Продолжающийся',
                    'en' => 'Ongoing',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Ongoing', // Fixed case to match English standard
            ],
            [
                'slug'    => 'approved',
                'name'    => json_encode([
                    'uz' => "Tasdiqlangan",
                    'ru' => 'Одобренный',
                    'en' => 'Approved',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Approved',
            ],
            [
                'slug'    => 'completed',
                'name'    => json_encode([
                    'uz' => "Yakunlangan",
                    'ru' => 'Завершённый',
                    'en' => 'Completed',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Completed', // Fixed case to match English standard
            ],
            [
                'slug'    => 'logout',
                'name'    => json_encode([
                    'uz' => "Chiqish",
                    'ru' => 'Выход',
                    'en' => 'Logout',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Logout', // Fixed case to match English standard
            ],
            [
                'slug'    => 'menus',
                'name'    => json_encode([
                    'uz' => "Menyular",
                    'ru' => 'Меню',
                    'en' => 'Menus',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Menus',
            ],
            [
                'slug'    => 'partners',
                'name'    => json_encode([
                    'uz' => "Hamkorlar",
                    'ru' => 'Партнёры',
                    'en' => 'Partners',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Partners',
            ],
            [
                'slug'    => 'my_profile',
                'name'    => json_encode([
                    'uz' => "Mening profilim",
                    'ru' => 'Мой профиль',
                    'en' => 'My profile',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'My profile',
            ],
            [
                'slug'    => 'notification',
                'name'    => json_encode([
                    'uz' => "Amal muvaffaqiyatli bajarildi!",
                    'ru' => 'Действие успешно выполнено!',
                    'en' => 'The action was successfully completed!',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'The action was successfully completed!',
            ],
            [
                'slug'    => 'scanner',
                'name'    => json_encode([
                    'uz' => "Skaner",
                    'ru' => 'Сканер',
                    'en' => 'Scanner',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Scanner',
            ],
            [
                'slug'    => 'qk_code',
                'name'    => json_encode([
                    'uz' => "QR kod",
                    'ru' => 'QR-код',
                    'en' => 'QR Code',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'QR Code',
            ],
            [
                'slug'    => 'scanner_messages',
                'name'    => json_encode([
                    'uz' => "Bunday ishtirokchi mavjud emas!",
                    'ru' => 'Такого участника не существует!',
                    'en' => 'Such a participant does not exist!',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Such a participant does not exist!',
            ],
            [
                'slug'    => 'media',
                'name'    => json_encode([
                    'uz' => "Media",
                    'ru' => 'Медиа',
                    'en' => 'Media',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Media', // Adjusted to match slug 'media' instead of 'Site Settings'
            ],
            [
                'slug'    => 'presence',
                'name'    => json_encode([
                    'uz' => "Davomat",
                    'ru' => 'Присутствие',
                    'en' => 'Presence',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Presence', // Fixed default to match English
            ],
            [
                'slug'    => 'back',
                'name'    => json_encode([
                    'uz' => "Orqaga",
                    'ru' => 'Назад',
                    'en' => 'Back',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Back', // Fixed default to match English
            ],
            [
                'slug'    => 'created',
                'name'    => json_encode([
                    'uz' => "Yaratilgan",
                    'ru' => 'Создано',
                    'en' => 'Created',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Created', // Fixed default to match English
            ],
            [
                'slug'    => 'code_verifay',
                'name'    => json_encode([
                    'uz' => "Tasdiq kodi",
                    'ru' => 'Код подтверждения',
                    'en' => 'Verification Code',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Verification Code',
            ],
            [
                'slug'    => 'i_agree',
                'name'    => json_encode([
                    'uz' => "Men FIDE 46-Shaxmat Olimpiadasining Shartlari va Maxfiylik siyosatiga, shu jumladan akkreditatsiya va tadbirda ishtirok etish uchun shaxsiy ma'lumotlarimni qayta ishlashga roziman.",
                    'ru' => "Я согласен с Условиями и Политикой конфиденциальности 46-й Шахматной Олимпиады ФИДЕ, включая обработку моих персональных данных для аккредитации и участия в мероприятии.",
                    'en' => "I agree to the Terms & Conditions and Privacy Policy of the 46th FIDE Chess Olympiad, including the processing of my personal data for accreditation and event participation.",
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'I agree to the Terms & Conditions and Privacy Policy of the 46th FIDE Chess Olympiad, including the processing of my personal data for accreditation and event participation.', // Fixed default to English
            ],
            [
                'slug'    => 'personal_info',
                'name'    => json_encode([
                    'uz' => "Shaxsiy ma'lumotlar",
                    'ru' => 'Персональная информация',
                    'en' => 'Personal Information',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Personal Information',
            ],
            [
                'slug'    => 'register_for_accreditation',
                'name'    => json_encode([
                    'uz' => "Akkreditatsiya uchun ro'yxatdan o'tish",
                    'ru' => 'Зарегистрироваться для аккредитации',
                    'en' => 'Register for Accreditation',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Register for Accreditation', // Adjusted for brevity
            ],
            [
                'slug'    => 'in_passport',
                'name'    => json_encode([
                    'uz' => "Pasportdagi kabi",
                    'ru' => 'Как в паспорте',
                    'en' => 'As in passport',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'As in passport', // Adjusted case
            ],
            [
                'slug'    => 'latest_news',
                'name'    => json_encode([
                    'uz' => "So'nggi yangiliklar",
                    'ru' => 'Последние новости',
                    'en' => 'Latest News',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Latest News',
            ],
            [
                'slug'    => 'hotel_title',
                'name'    => json_encode([
                    'uz' => "Mehmonxonangizdan rohatlaning va qadimiy Samarqandni kashf eting",
                    'ru' => "Наслаждайтесь пребыванием и исследуйте древний Самарканд",
                    'en' => 'Enjoy Your Stay & Explore Ancient Samarkand',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Enjoy Your Stay & Explore Ancient Samarkand', // Fixed default to English
            ],
            [
                'slug'    => 'hotel_description',
                'name'    => json_encode([
                    'uz' => "Samarqandning go'zalliklarini his qilib, tadbir o'tkaziladigan joy yaqinidagi yuqori baholangan mehmonxonalarda qoling.",
                    'ru' => "Получите максимум удовольствия от визита, остановившись в лучших отелях недалеко от места проведения мероприятия и любуясь красотами Самарканда.",
                    'en' => 'Make the most of your visit by staying at top-rated hotels near the event venue while experiencing the beauty of Samarkand.',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Make the most of your visit by staying at top-rated hotels near the event venue while experiencing the beauty of Samarkand.',
            ],
            [
                'slug'    => 'read_more',
                'name'    => json_encode([
                    'uz' => "Ko'proq o'qish",
                    'ru' => 'Читать далее',
                    'en' => 'Read more',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Read more',
            ],
            [
                'slug'    => 'back_to_homepage',
                'name'    => json_encode([
                    'uz' => "Bosh sahifaga qaytish",
                    'ru' => 'Вернуться на главную страницу',
                    'en' => 'Back to Homepage',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Back to Homepage',
            ],
            [
                'slug'    => 'register_event',
                'name'    => json_encode([
                    'uz' => "Tadbirga ro'yxatdan o'tish",
                    'ru' => 'Зарегистрироваться на мероприятие',
                    'en' => 'Register for the event',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Register for the event',
            ],
            [
                'slug'    => 'register_event_fide_id',
                'name'    => json_encode([
                    'uz' => "Ro'yxatdan o'tish sahifasiga o'tish uchun FIDE ID-ni kiriting",
                    'ru' => 'Введите ваш FIDE ID для перехода на страницу регистрации',
                    'en' => 'Please input your FIDE ID to proceed to the registration page',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Please input your FIDE ID to proceed to the registration page',
            ],
            [
                'slug'    => 'footer_text',
                'name'    => json_encode([
                    'uz' => "Mualliflik huquqi 2025 O'zbekiston Shaxmat Federatsiyasi va FIDE Xalqaro Shaxmat Federatsiyasi. Barcha huquqlar himoyalangan.",
                    'ru' => 'Авторские права 2025 Узбекистанская шахматная федерация и Международная шахматная федерация ФИДЕ. Все права защищены.',
                    'en' => 'Copyrights 2025 Uzbekistan Chess Federation & FIDE International Chess Federation. All Rights Reserved.',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Copyrights 2025 Uzbekistan Chess Federation & FIDE International Chess Federation. All Rights Reserved.',
            ],
            [
                'slug'    => 'standard_rating',
                'name'    => json_encode([
                    'uz' => "Standart reyting",
                    'ru' => 'Стандартный рейтинг',
                    'en' => 'Standard Rating',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Standard Rating',
            ],
            [
                'slug'    => 'blitz_rating',
                'name'    => json_encode([
                    'uz' => "Blits reyting",
                    'ru' => 'Блиц-рейтинг',
                    'en' => 'Blitz Rating',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Blitz Rating',
            ],
            [
                'slug'    => 'rapid_rating',
                'name'    => json_encode([
                    'uz' => "Tezkor reyting",
                    'ru' => 'Рапид-рейтинг',
                    'en' => 'Rapid Rating',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Rapid Rating', // Fixed typo 'Papid' to 'Rapid'
            ],
            [
                'slug'    => 'not_available',
                'name'    => json_encode([
                    'uz' => "Mavjud emas",
                    'ru' => 'Недоступно',
                    'en' => 'Not available',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Not available',
            ],
            [
                'slug'    => 'm',
                'name'    => json_encode([
                    'uz' => "Erkak",
                    'ru' => 'Мужчина',
                    'en' => 'Male',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Male',
            ],
            [
                'slug'    => 'f',
                'name'    => json_encode([
                    'uz' => "Ayol",
                    'ru' => 'Женщина',
                    'en' => 'Female',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Female',
            ],
            [
                'slug'    => 'register_as_guest',
                'name'    => json_encode([
                    'uz' => "Mehmon sifatida ro'yxatdan o'tish",
                    'ru' => 'Зарегистрироваться как гость',
                    'en' => 'Register as a guest',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Register as a guest',
            ],
            [
                'slug'    => 'check',
                'name'    => json_encode([
                    'uz' => "Tekshirish",
                    'ru' => 'Проверить',
                    'en' => 'Check',
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Check',
            ],
            [
                'slug'    => 'photo_for_accreditation',
                'name'    => json_encode([
                    'uz' => "Akkreditatsiya uchun rasm",
                    'ru' => "Фото для аккредитации",
                    'en' => "Photo for Accreditation",
                ], JSON_UNESCAPED_UNICODE),
                'default' => 'Photo for Accreditation',
            ],

        ];
        foreach ($translations as $translation) {
            $existingTranslation = Translation::where('slug', $translation['slug'])->first();

            if (! $existingTranslation) {
                Translation::create($translation);
            }
        }
        // Translation::insert($translations);
    }
}
