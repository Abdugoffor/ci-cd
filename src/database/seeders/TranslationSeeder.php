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
                'slug' => 'competitions',
                'name' => json_encode([
                    'uz'      => 'Musobaqalar',
                    'ru'      => 'Соревнования',
                    'en'      => 'Competitions',
                    'default' => 'Competitions',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'add',
                'name' => json_encode([
                    'uz'      => "Qo'shish",
                    'ru'      => 'Добавить',
                    'en'      => 'Add',
                    'default' => 'Add',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'competition-type',
                'name' => json_encode([
                    'uz'      => "Musobaqa turi",
                    'ru'      => 'Тип соревнования',
                    'en'      => 'Competition type',
                    'default' => 'Competition type',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'country',
                'name' => json_encode([
                    'uz'      => "Mamlakat",
                    'ru'      => 'Страна',
                    'en'      => 'Country',
                    'default' => 'Country',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'start-of-registration',
                'name' => json_encode([
                    'uz'      => "Ro'yxatdan o'tish boshlanishi",
                    'ru'      => 'Начало регистрации',
                    'en'      => 'Start of registration',
                    'default' => 'Start of registration',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'registration-completed',
                'name' => json_encode([
                    'uz'      => "Ro'yxatdan o'tish yakunlandi",
                    'ru'      => 'Регистрация завершена',
                    'en'      => 'Registration completed',
                    'default' => 'Registration completed',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'start',
                'name' => json_encode([
                    'uz'      => "Boshlash",
                    'ru'      => 'Начать',
                    'en'      => 'Start',
                    'default' => 'Start',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'finished',
                'name' => json_encode([
                    'uz'      => "Tugallandi",
                    'ru'      => 'Завершено',
                    'en'      => 'Finished',
                    'default' => 'Finished',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'status',
                'name' => json_encode([
                    'uz'      => "Holati",
                    'ru'      => 'Статус',
                    'en'      => 'Status',
                    'default' => 'Status',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'participants',
                'name' => json_encode([
                    'uz'      => "Ishtirokchilar",
                    'ru'      => 'Участники',
                    'en'      => 'Participants',
                    'default' => 'Participants',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'function',
                'name' => json_encode([
                    'uz'      => "Funktsiya",
                    'ru'      => 'Функция',
                    'en'      => 'Function',
                    'default' => 'Function',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'history',
                'name' => json_encode([
                    'uz'      => "Tarix",
                    'ru'      => 'История',
                    'en'      => 'History',
                    'default' => 'History',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'name',
                'name' => json_encode([
                    'uz'      => "Ism",
                    'ru'      => 'Имя',
                    'en'      => 'Name',
                    'default' => 'Name',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'category',
                'name' => json_encode([
                    'uz'      => "Kategoriya",
                    'ru'      => 'Категория',
                    'en'      => 'Category',
                    'default' => 'Category',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'description',
                'name' => json_encode([
                    'uz'      => "Tavsif",
                    'ru'      => 'Описание',
                    'en'      => 'Description',
                    'default' => 'Description',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'logo',
                'name' => json_encode([
                    'uz'      => "Logotip",
                    'ru'      => 'Логотип',
                    'en'      => 'Logo',
                    'default' => 'Logo',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'change',
                'name' => json_encode([
                    'uz'      => "O'zgartirish",
                    'ru'      => 'Изменить',
                    'en'      => 'Change',
                    'default' => 'Change',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'delete',
                'name' => json_encode([
                    'uz'      => "O'chirish",
                    'ru'      => 'Удалить',
                    'en'      => 'Delete',
                    'default' => 'Delete',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'standard',
                'name' => json_encode([
                    'uz'      => "Standart",
                    'ru'      => 'Стандарт',
                    'en'      => 'Standard',
                    'default' => 'Standard',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'type',
                'name' => json_encode([
                    'uz'      => "Turi",
                    'ru'      => 'Тип',
                    'en'      => 'Type',
                    'default' => 'Type',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'applications',
                'name' => json_encode([
                    'uz'      => "Arizalar",
                    'ru'      => 'Заявки',
                    'en'      => 'Applications',
                    'default' => 'Applications',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'birth-date',
                'name' => json_encode([
                    'uz'      => "Tug'ilgan sana",
                    'ru'      => 'Дата рождения',
                    'en'      => 'Birth date',
                    'default' => 'Birth date',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'gender',
                'name' => json_encode([
                    'uz'      => "Jins",
                    'ru'      => 'Пол',
                    'en'      => 'Gender',
                    'default' => 'Gender',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'email',
                'name' => json_encode([
                    'uz'      => "Elektron pochta",
                    'ru'      => 'Электронная почта',
                    'en'      => 'Email',
                    'default' => 'Email',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'visa-required',
                'name' => json_encode([
                    'uz'      => "Viza talab qilinadi",
                    'ru'      => 'Требуется виза',
                    'en'      => 'Visa required',
                    'default' => 'Visa required',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'registration-end',
                'name' => json_encode([
                    'uz'      => "Ro'yxatdan o'tish tugash sanasi",
                    'ru'      => 'Дата окончания регистрации',
                    'en'      => 'Registration end',
                    'default' => 'Registration end',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'arrival-date',
                'name' => json_encode([
                    'uz'      => "Kelish sanasi",
                    'ru'      => 'Дата прибытия',
                    'en'      => 'Arrival date',
                    'default' => 'Arrival date',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'departure-date',
                'name' => json_encode([
                    'uz'      => "Jo'nash sanasi",
                    'ru'      => 'Дата отъезда',
                    'en'      => 'Departure date',
                    'default' => 'Departure date',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'view',
                'name' => json_encode([
                    'uz'      => "Ko'rish",
                    'ru'      => 'Просмотр',
                    'en'      => 'View',
                    'default' => 'View',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'application',
                'name' => json_encode([
                    'uz'      => "Ariza",
                    'ru'      => 'Заявка',
                    'en'      => 'Application',
                    'default' => 'Application',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'last-name',
                'name' => json_encode([
                    'uz'      => "Familiya",
                    'ru'      => 'Фамилия',
                    'en'      => 'Last name',
                    'default' => 'Last name',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'email-confirmed',
                'name' => json_encode([
                    'uz'      => "Elektron pochta tasdiqlandi",
                    'ru'      => 'Электронная почта подтверждена',
                    'en'      => 'Email confirmed',
                    'default' => 'Email confirmed',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'fide-id',
                'name' => json_encode([
                    'uz'      => "FIDE ID",
                    'ru'      => 'FIDE ID',
                    'en'      => 'FIDE ID',
                    'default' => 'FIDE ID',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'accreditation-category',
                'name' => json_encode([
                    'uz'      => "Akkreditatsiya kategoriyasi",
                    'ru'      => 'Категория аккредитации',
                    'en'      => 'Accreditation category',
                    'default' => 'Accreditation category',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'citizenship',
                'name' => json_encode([
                    'uz'      => "Fuqarolik",
                    'ru'      => 'Гражданство',
                    'en'      => 'Citizenship',
                    'default' => 'Citizenship',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'passport-number',
                'name' => json_encode([
                    'uz'      => "Pasport raqami",
                    'ru'      => 'Номер паспорта',
                    'en'      => 'Passport number',
                    'default' => 'Passport number',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'passport-issue-date',
                'name' => json_encode([
                    'uz'      => "Pasport berilgan sana",
                    'ru'      => 'Дата выдачи паспорта',
                    'en'      => 'Passport issue date',
                    'default' => 'Passport issue date',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'passport-validity-period',
                'name' => json_encode([
                    'uz'      => "Pasportning amal qilish muddati",
                    'ru'      => 'Срок действия паспорта',
                    'en'      => 'Passport validity period',
                    'default' => 'Passport validity period',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'passport-issuing-authority',
                'name' => json_encode([
                    'uz'      => "Pasport beruvchi organ",
                    'ru'      => 'Орган выдачи паспорта',
                    'en'      => 'Passport issuing authority',
                    'default' => 'Passport issuing authority',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'copy-of-passport',
                'name' => json_encode([
                    'uz'      => "Pasport nusxasi",
                    'ru'      => 'Копия паспорта',
                    'en'      => 'Copy of passport',
                    'default' => 'Copy of passport',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'no-data',
                'name' => json_encode([
                    'uz'      => "Ma'lumot yo'q",
                    'ru'      => 'Нет данных',
                    'en'      => 'No data',
                    'default' => 'No data',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'phone',
                'name' => json_encode([
                    'uz'      => "Telefon",
                    'ru'      => 'Телефон',
                    'en'      => 'Phone',
                    'default' => 'Phone',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'photo',
                'name' => json_encode([
                    'uz'      => "Fotosurat",
                    'ru'      => 'Фотография',
                    'en'      => 'Photo',
                    'default' => 'Photo',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'no-photo',
                'name' => json_encode([
                    'uz'      => "Fotosurat yo'q",
                    'ru'      => 'Нет фотографии',
                    'en'      => 'No photo',
                    'default' => 'No photo',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'yes',
                'name' => json_encode([
                    'uz'      => "Ha",
                    'ru'      => 'Да',
                    'en'      => 'Yes',
                    'default' => 'Yes',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'no',
                'name' => json_encode([
                    'uz'      => "Yo'q",
                    'ru'      => 'Нет',
                    'en'      => 'No',
                    'default' => 'No',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'accommodation-details',
                'name' => json_encode([
                    'uz'      => "Yashash joyi tafsilotlari",
                    'ru'      => 'Детали проживания',
                    'en'      => 'Accommodation details',
                    'default' => 'Accommodation details',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'pcr-test-details',
                'name' => json_encode([
                    'uz'      => "PCR test tafsilotlari",
                    'ru'      => 'Детали ПЦР-теста',
                    'en'      => 'PCR test details',
                    'default' => 'PCR test details',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'reason-for-cancellation',
                'name' => json_encode([
                    'uz'      => "Bekor qilish sababi",
                    'ru'      => 'Причина отмены',
                    'en'      => 'Reason for cancellation',
                    'default' => 'Reason for cancellation',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'close',
                'name' => json_encode([
                    'uz'      => "Yopish",
                    'ru'      => 'Закрыть',
                    'en'      => 'Close',
                    'default' => 'Close',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'confirm',
                'name' => json_encode([
                    'uz'      => "Tasdiqlash",
                    'ru'      => 'Подтвердить',
                    'en'      => 'Confirm',
                    'default' => 'Confirm',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'acceptance',
                'name' => json_encode([
                    'uz'      => "Qabul qilish",
                    'ru'      => 'Принятие',
                    'en'      => 'Acceptance',
                    'default' => 'Acceptance',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'canceled',
                'name' => json_encode([
                    'uz'      => "Bekor qilingan",
                    'ru'      => 'Отменено',
                    'en'      => 'Canceled',
                    'default' => 'Canceled',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'role',
                'name' => json_encode([
                    'uz'      => "Rol",
                    'ru'      => 'Роль',
                    'en'      => 'Role',
                    'default' => 'Role',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'users',
                'name' => json_encode([
                    'uz'      => "Foydalanuvchilar",
                    'ru'      => 'Пользователи',
                    'en'      => 'Users',
                    'default' => 'Users',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'do-you-want-to-delete',
                'name' => json_encode([
                    'uz'      => "O'chirishni xohlaysizmi?",
                    'ru'      => 'Хотите удалить?',
                    'en'      => 'Do you want to delete?',
                    'default' => 'Do you want to delete?',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'assets',
                'name' => json_encode([
                    'uz'      => "Aktivlar",
                    'ru'      => 'Активы',
                    'en'      => 'Assets',
                    'default' => 'Assets',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'not-active',
                'name' => json_encode([
                    'uz'      => "Faol emas",
                    'ru'      => 'Не активен',
                    'en'      => 'Not active',
                    'default' => 'Not active',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'password',
                'name' => json_encode([
                    'uz'      => "Parol",
                    'ru'      => 'Пароль',
                    'en'      => 'Password',
                    'default' => 'Password',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'password_conf',
                'name' => json_encode([
                    'uz'      => "Parolni tasdiqlash",
                    'ru'      => 'Подтверждение пароля',
                    'en'      => 'Password confirmation',
                    'default' => 'Password confirmation',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'language',
                'name' => json_encode([
                    'uz'      => "Til",
                    'ru'      => 'Язык',
                    'en'      => 'Language',
                    'default' => 'Language',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'translations',
                'name' => json_encode([
                    'uz'      => "Tarjimalar",
                    'ru'      => 'Переводы',
                    'en'      => 'Translations',
                    'default' => 'Translations',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'hotels',
                'name' => json_encode([
                    'uz'      => "Mehmonxonalar",
                    'ru'      => 'Отели',
                    'en'      => 'Hotels',
                    'default' => 'Hotels',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'contacts',
                'name' => json_encode([
                    'uz'      => "Aloqalar",
                    'ru'      => 'Контакты',
                    'en'      => 'Contacts',
                    'default' => 'Contacts',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'path',
                'name' => json_encode([
                    'uz'      => "Yo'l",
                    'ru'      => 'Путь',
                    'en'      => 'Path',
                    'default' => 'Path',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'title',
                'name' => json_encode([
                    'uz'      => "Sarlavha",
                    'ru'      => 'Заголовок',
                    'en'      => 'Title',
                    'default' => 'Title',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'text',
                'name' => json_encode([
                    'uz'      => "Matn",
                    'ru'      => 'Текст',
                    'en'      => 'Text',
                    'default' => 'Text',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'rating',
                'name' => json_encode([
                    'uz'      => "Reyting",
                    'ru'      => 'Рейтинг',
                    'en'      => 'Rating',
                    'default' => 'Rating',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'location',
                'name' => json_encode([
                    'uz'      => "Manzil",
                    'ru'      => 'Местоположение',
                    'en'      => 'Location',
                    'default' => 'Location',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'news',
                'name' => json_encode([
                    'uz'      => "Yangiliklar",
                    'ru'      => 'Новости',
                    'en'      => 'News',
                    'default' => 'News',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'accreditation-categories',
                'name' => json_encode([
                    'uz'      => "Akkreditatsiya kategoriyalari",
                    'ru'      => 'Категории аккредитации',
                    'en'      => 'Accreditation categories',
                    'default' => 'Accreditation categories',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'search',
                'name' => json_encode([
                    'uz'      => "Qidirish",
                    'ru'      => 'Поиск',
                    'en'      => 'Search',
                    'default' => 'Search',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'M',
                'name' => json_encode([
                    'uz'      => "Erkak",
                    'ru'      => 'Мужчина',
                    'en'      => 'Male',
                    'default' => 'Male',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'L',
                'name' => json_encode([
                    'uz'      => "Ayol",
                    'ru'      => 'Женщина',
                    'en'      => 'Female',
                    'default' => 'Female',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'unfinished',
                'name' => json_encode([
                    'uz'      => "Tugallanmagan",
                    'ru'      => 'Незаконченный',
                    'en'      => 'Unfinished',
                    'default' => 'Unfinished',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'pending',
                'name' => json_encode([
                    'uz'      => "Kutilmoqda",
                    'ru'      => 'Ожидающий',
                    'en'      => 'Pending',
                    'default' => 'Pending',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'ongoing',
                'name' => json_encode([
                    'uz'      => "Davom etmoqda",
                    'ru'      => 'Продолжающийся',
                    'en'      => 'Ongoing',
                    'default' => 'Ongoing',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'approved',
                'name' => json_encode([
                    'uz'      => "Tasdiqlangan",
                    'ru'      => 'Одобренный',
                    'en'      => 'Approved',
                    'default' => 'Approved',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'completed',
                'name' => json_encode([
                    'uz'      => "Yakunlangan",
                    'ru'      => 'Завершённый',
                    'en'      => 'Completed',
                    'default' => 'Completed',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'logout',
                'name' => json_encode([
                    'uz'      => "Chiqish",
                    'ru'      => 'Выход',
                    'en'      => 'Logout',
                    'default' => 'Logout',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'menus',
                'name' => json_encode([
                    'uz'      => "Menyular",
                    'ru'      => 'Меню',
                    'en'      => 'Menus',
                    'default' => 'Menus',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'partners',
                'name' => json_encode([
                    'uz'      => "Hamkorlar",
                    'ru'      => 'Партнёры',
                    'en'      => 'Partners',
                    'default' => 'Partners',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'my_profile',
                'name' => json_encode([
                    'uz'      => "Mening profilim",
                    'ru'      => 'Мой профиль',
                    'en'      => 'My profile',
                    'default' => 'My profile',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'notification',
                'name' => json_encode([
                    'uz'      => "Amal muvaffaqiyatli bajarildi!",
                    'ru'      => 'Действие успешно выполнено!',
                    'en'      => 'The action was successfully completed!',
                    'default' => 'The action was successfully completed!',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'scanner',
                'name' => json_encode([
                    'uz'      => "Skaner",
                    'ru'      => 'Сканер',
                    'en'      => 'Scanner',
                    'default' => 'Scanner',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'qk_code',
                'name' => json_encode([
                    'uz'      => "QR kod",
                    'ru'      => 'QR-код',
                    'en'      => 'QR Code',
                    'default' => 'QR Code',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'scanner_messages',
                'name' => json_encode([
                    'uz'      => "Bunday ishtirokchi mavjud emas!",
                    'ru'      => 'Такого участника не существует!',
                    'en'      => 'Such a participant does not exist!',
                    'default' => 'Such a participant does not exist!',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'media',
                'name' => json_encode([
                    'uz'      => "Media",
                    'ru'      => 'Медиа',
                    'en'      => 'Media',
                    'default' => 'Media',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'presence',
                'name' => json_encode([
                    'uz'      => "Davomat",
                    'ru'      => 'Присутствие',
                    'en'      => 'Presence',
                    'default' => 'Presence',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'back',
                'name' => json_encode([
                    'uz'      => "Orqaga",
                    'ru'      => 'Назад',
                    'en'      => 'Back',
                    'default' => 'Back',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'created',
                'name' => json_encode([
                    'uz'      => "Yaratilgan",
                    'ru'      => 'Создано',
                    'en'      => 'Created',
                    'default' => 'Created',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'code_verifay',
                'name' => json_encode([
                    'uz'      => "Tasdiq kodi",
                    'ru'      => 'Код подтверждения',
                    'en'      => 'Verification Code',
                    'default' => 'Verification Code',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'i_agree',
                'name' => json_encode([
                    'uz'      => "Men FIDE 46-Shaxmat Olimpiadasining Shartlari va Maxfiylik siyosatiga, shu jumladan akkreditatsiya va tadbirda ishtirok etish uchun shaxsiy ma'lumotlarimni qayta ishlashga roziman.",
                    'ru'      => "Я согласен с Условиями и Политикой конфиденциальности 46-й Шахматной Олимпиады ФИДЕ, включая обработку моих персональных данных для аккредитации и участия в мероприятии.",
                    'en'      => "I agree to the Terms & Conditions and Privacy Policy of the 46th FIDE Chess Olympiad, including the processing of my personal data for accreditation and event participation.",
                    'default' => "I agree to the Terms & Conditions and Privacy Policy of the 46th FIDE Chess Olympiad, including the processing of my personal data for accreditation and event participation.",
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'personal_info',
                'name' => json_encode([
                    'uz'      => "Shaxsiy ma'lumotlar",
                    'ru'      => 'Персональная информация',
                    'en'      => 'Personal Information',
                    'default' => 'Personal Information',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'register_for_accreditation',
                'name' => json_encode([
                    'uz'      => "Akkreditatsiya uchun ro'yxatdan o'tish",
                    'ru'      => 'Зарегистрироваться для аккредитации',
                    'en'      => 'Register for Accreditation',
                    'default' => 'Register for Accreditation',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'in_passport',
                'name' => json_encode([
                    'uz'      => "Pasportdagi kabi",
                    'ru'      => 'Как в паспорте',
                    'en'      => 'As in passport',
                    'default' => 'As in passport',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'latest_news',
                'name' => json_encode([
                    'uz'      => "So'nggi yangiliklar",
                    'ru'      => 'Последние новости',
                    'en'      => 'Latest News',
                    'default' => 'Latest News',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'hotel_title',
                'name' => json_encode([
                    'uz'      => "Mehmonxonangizdan rohatlaning va qadimiy Samarqandni kashf eting",
                    'ru'      => "Наслаждайтесь пребыванием и исследуйте древний Самарканд",
                    'en'      => 'Enjoy Your Stay & Explore Ancient Samarkand',
                    'default' => 'Enjoy Your Stay & Explore Ancient Samarkand',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'hotel_description',
                'name' => json_encode([
                    'uz'      => "Samarqandning go'zalliklarini his qilib, tadbir o'tkaziladigan joy yaqinidagi yuqori baholangan mehmonxonalarda qoling.",
                    'ru'      => "Получите максимум удовольствия от визита, остановившись в лучших отелях недалеко от места проведения мероприятия и любуясь красотами Самарканда.",
                    'en'      => 'Make the most of your visit by staying at top-rated hotels near the event venue while experiencing the beauty of Samarkand.',
                    'default' => 'Make the most of your visit by staying at top-rated hotels near the event venue while experiencing the beauty of Samarkand.',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'read_more',
                'name' => json_encode([
                    'uz'      => "Ko'proq o'qish",
                    'ru'      => 'Читать далее',
                    'en'      => 'Read more',
                    'default' => 'Read more',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'back_to_homepage',
                'name' => json_encode([
                    'uz'      => "Bosh sahifaga qaytish",
                    'ru'      => 'Вернуться на главную страницу',
                    'en'      => 'Back to Homepage',
                    'default' => 'Back to Homepage',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'register_event',
                'name' => json_encode([
                    'uz'      => "Tadbirga ro'yxatdan o'tish",
                    'ru'      => 'Зарегистрироваться на мероприятие',
                    'en'      => 'Register for the event',
                    'default' => 'Register for the event',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'register_event_fide_id',
                'name' => json_encode([
                    'uz'      => "Ro'yxatdan o'tish sahifasiga o'tish uchun FIDE ID-ni kiriting",
                    'ru'      => 'Введите ваш FIDE ID для перехода на страницу регистрации',
                    'en'      => 'Please input your FIDE ID to proceed to the registration page',
                    'default' => 'Please input your FIDE ID to proceed to the registration page',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'footer_text',
                'name' => json_encode([
                    'uz'      => "Mualliflik huquqi 2025 O'zbekiston Shaxmat Federatsiyasi va FIDE Xalqaro Shaxmat Federatsiyasi. Barcha huquqlar himoyalangan.",
                    'ru'      => 'Авторские права 2025 Узбекистанская шахматная федерация и Международная шахматная федерация ФИДЕ. Все права защищены.',
                    'en'      => 'Copyrights 2025 Uzbekistan Chess Federation & FIDE International Chess Federation. All Rights Reserved.',
                    'default' => 'Copyrights 2025 Uzbekistan Chess Federation & FIDE International Chess Federation. All Rights Reserved.',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'standard_rating',
                'name' => json_encode([
                    'uz'      => "Standart reyting",
                    'ru'      => 'Стандартный рейтинг',
                    'en'      => 'Standard Rating',
                    'default' => 'Standard Rating',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'blitz_rating',
                'name' => json_encode([
                    'uz'      => "Blits reyting",
                    'ru'      => 'Блиц-рейтинг',
                    'en'      => 'Blitz Rating',
                    'default' => 'Blitz Rating',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'rapid_rating',
                'name' => json_encode([
                    'uz'      => "Tezkor reyting",
                    'ru'      => 'Рапид-рейтинг',
                    'en'      => 'Rapid Rating',
                    'default' => 'Rapid Rating',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'not_available',
                'name' => json_encode([
                    'uz'      => "Mavjud emas",
                    'ru'      => 'Недоступно',
                    'en'      => 'Not available',
                    'default' => 'Not available',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'm',
                'name' => json_encode([
                    'uz'      => "Erkak",
                    'ru'      => 'Мужчина',
                    'en'      => 'Male',
                    'default' => 'Male',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'f',
                'name' => json_encode([
                    'uz'      => "Ayol",
                    'ru'      => 'Женщина',
                    'en'      => 'Female',
                    'default' => 'Female',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'register_as_guest',
                'name' => json_encode([
                    'uz'      => "Mehmon sifatida ro'yxatdan o'tish",
                    'ru'      => 'Зарегистрироваться как гость',
                    'en'      => 'Register as a guest',
                    'default' => 'Register as a guest',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'check',
                'name' => json_encode([
                    'uz'      => "Tekshirish",
                    'ru'      => 'Проверить',
                    'en'      => 'Check',
                    'default' => 'Check',
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'slug' => 'photo_for_accreditation',
                'name' => json_encode([
                    'uz'      => "Akkreditatsiya uchun rasm",
                    'ru'      => "Фото для аккредитации",
                    'en'      => "Photo for Accreditation",
                    'default' => 'Photo for Accreditation',
                ], JSON_UNESCAPED_UNICODE),
            ],
        ];

        foreach ($translations as $translation) {
            $existingTranslation = Translation::where('slug', $translation['slug'])->first();

            if (! $existingTranslation) {
                Translation::create($translation);
            }
        }
    }
}
