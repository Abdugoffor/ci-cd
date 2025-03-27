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
                'name' => [
                    'uz'      => 'Musobaqalar',
                    'ru'      => 'Соревнования',
                    'en'      => 'Competitions',
                    'default' => 'Competitions',
                ],
            ],
            [
                'slug' => 'add',
                'name' => [
                    'uz'      => "Qo'shish",
                    'ru'      => 'Добавить',
                    'en'      => 'Add',
                    'default' => 'Add',
                ],
            ],
            [
                'slug' => 'competition-type',
                'name' => [
                    'uz'      => "Musobaqa turi",
                    'ru'      => 'Тип соревнования',
                    'en'      => 'Competition type',
                    'default' => 'Competition type',
                ],
            ],
            [
                'slug' => 'country',
                'name' => [
                    'uz'      => "Mamlakat",
                    'ru'      => 'Страна',
                    'en'      => 'Country',
                    'default' => 'Country',
                ],
            ],
            [
                'slug' => 'start-of-registration',
                'name' => [
                    'uz'      => "Ro'yxatdan o'tish boshlanishi",
                    'ru'      => 'Начало регистрации',
                    'en'      => 'Start of registration',
                    'default' => 'Start of registration',
                ],
            ],
            [
                'slug' => 'registration-completed',
                'name' => [
                    'uz'      => "Ro'yxatdan o'tish yakunlandi",
                    'ru'      => 'Регистрация завершена',
                    'en'      => 'Registration completed',
                    'default' => 'Registration completed',
                ],
            ],
            [
                'slug' => 'start',
                'name' => [
                    'uz'      => "Boshlash",
                    'ru'      => 'Начать',
                    'en'      => 'Start',
                    'default' => 'Start',
                ],
            ],
            [
                'slug' => 'finished',
                'name' => [
                    'uz'      => "Tugallandi",
                    'ru'      => 'Завершено',
                    'en'      => 'Finished',
                    'default' => 'Finished',
                ],
            ],
            [
                'slug' => 'status',
                'name' => [
                    'uz'      => "Holati",
                    'ru'      => 'Статус',
                    'en'      => 'Status',
                    'default' => 'Status',
                ],
            ],
            [
                'slug' => 'participants',
                'name' => [
                    'uz'      => "Ishtirokchilar",
                    'ru'      => 'Участники',
                    'en'      => 'Participants',
                    'default' => 'Participants',
                ],
            ],
            [
                'slug' => 'function',
                'name' => [
                    'uz'      => "Funktsiya",
                    'ru'      => 'Функция',
                    'en'      => 'Function',
                    'default' => 'Function',
                ],
            ],
            [
                'slug' => 'history',
                'name' => [
                    'uz'      => "Tarix",
                    'ru'      => 'История',
                    'en'      => 'History',
                    'default' => 'History',
                ],
            ],
            [
                'slug' => 'name',
                'name' => [
                    'uz'      => "Ism",
                    'ru'      => 'Имя',
                    'en'      => 'Name',
                    'default' => 'Name',
                ],
            ],
            [
                'slug' => 'category',
                'name' => [
                    'uz'      => "Kategoriya",
                    'ru'      => 'Категория',
                    'en'      => 'Category',
                    'default' => 'Category',
                ],
            ],
            [
                'slug' => 'description',
                'name' => [
                    'uz'      => "Tavsif",
                    'ru'      => 'Описание',
                    'en'      => 'Description',
                    'default' => 'Description',
                ],
            ],
            [
                'slug' => 'logo',
                'name' => [
                    'uz'      => "Logotip",
                    'ru'      => 'Логотип',
                    'en'      => 'Logo',
                    'default' => 'Logo',
                ],
            ],
            [
                'slug' => 'change',
                'name' => [
                    'uz'      => "O'zgartirish",
                    'ru'      => 'Изменить',
                    'en'      => 'Change',
                    'default' => 'Change',
                ],
            ],
            [
                'slug' => 'delete',
                'name' => [
                    'uz'      => "O'chirish",
                    'ru'      => 'Удалить',
                    'en'      => 'Delete',
                    'default' => 'Delete',
                ],
            ],
            [
                'slug' => 'standard',
                'name' => [
                    'uz'      => "Standart",
                    'ru'      => 'Стандарт',
                    'en'      => 'Standard',
                    'default' => 'Standard',
                ],
            ],
            [
                'slug' => 'type',
                'name' => [
                    'uz'      => "Turi",
                    'ru'      => 'Тип',
                    'en'      => 'Type',
                    'default' => 'Type',
                ],
            ],
            [
                'slug' => 'applications',
                'name' => [
                    'uz'      => "Arizalar",
                    'ru'      => 'Заявки',
                    'en'      => 'Applications',
                    'default' => 'Applications',
                ],
            ],
            [
                'slug' => 'birth-date',
                'name' => [
                    'uz'      => "Tug'ilgan sana",
                    'ru'      => 'Дата рождения',
                    'en'      => 'Birth date',
                    'default' => 'Birth date',
                ],
            ],
            [
                'slug' => 'gender',
                'name' => [
                    'uz'      => "Jins",
                    'ru'      => 'Пол',
                    'en'      => 'Gender',
                    'default' => 'Gender',
                ],
            ],
            [
                'slug' => 'email',
                'name' => [
                    'uz'      => "Elektron pochta",
                    'ru'      => 'Электронная почта',
                    'en'      => 'Email',
                    'default' => 'Email',
                ],
            ],
            [
                'slug' => 'visa-required',
                'name' => [
                    'uz'      => "Viza talab qilinadi",
                    'ru'      => 'Требуется виза',
                    'en'      => 'Visa required',
                    'default' => 'Visa required',
                ],
            ],
            [
                'slug' => 'registration-end',
                'name' => [
                    'uz'      => "Ro'yxatdan o'tish tugash sanasi",
                    'ru'      => 'Дата окончания регистрации',
                    'en'      => 'Registration end',
                    'default' => 'Registration end',
                ],
            ],
            [
                'slug' => 'arrival-date',
                'name' => [
                    'uz'      => "Kelish sanasi",
                    'ru'      => 'Дата прибытия',
                    'en'      => 'Arrival date',
                    'default' => 'Arrival date',
                ],
            ],
            [
                'slug' => 'departure-date',
                'name' => [
                    'uz'      => "Jo'nash sanasi",
                    'ru'      => 'Дата отъезда',
                    'en'      => 'Departure date',
                    'default' => 'Departure date',
                ],
            ],
            [
                'slug' => 'view',
                'name' => [
                    'uz'      => "Ko'rish",
                    'ru'      => 'Просмотр',
                    'en'      => 'View',
                    'default' => 'View',
                ],
            ],
            [
                'slug' => 'application',
                'name' => [
                    'uz'      => "Ariza",
                    'ru'      => 'Заявка',
                    'en'      => 'Application',
                    'default' => 'Application',
                ],
            ],
            [
                'slug' => 'last-name',
                'name' => [
                    'uz'      => "Familiya",
                    'ru'      => 'Фамилия',
                    'en'      => 'Last name',
                    'default' => 'Last name',
                ],
            ],
            [
                'slug' => 'email-confirmed',
                'name' => [
                    'uz'      => "Elektron pochta tasdiqlandi",
                    'ru'      => 'Электронная почта подтверждена',
                    'en'      => 'Email confirmed',
                    'default' => 'Email confirmed',
                ],
            ],
            [
                'slug' => 'fide-id',
                'name' => [
                    'uz'      => "FIDE ID",
                    'ru'      => 'FIDE ID',
                    'en'      => 'FIDE ID',
                    'default' => 'FIDE ID',
                ],
            ],
            [
                'slug' => 'accreditation-category',
                'name' => [
                    'uz'      => "Akkreditatsiya kategoriyasi",
                    'ru'      => 'Категория аккредитации',
                    'en'      => 'Accreditation category',
                    'default' => 'Accreditation category',
                ],
            ],
            [
                'slug' => 'citizenship',
                'name' => [
                    'uz'      => "Fuqarolik",
                    'ru'      => 'Гражданство',
                    'en'      => 'Citizenship',
                    'default' => 'Citizenship',
                ],
            ],
            [
                'slug' => 'passport-number',
                'name' => [
                    'uz'      => "Pasport raqami",
                    'ru'      => 'Номер паспорта',
                    'en'      => 'Passport number',
                    'default' => 'Passport number',
                ],
            ],
            [
                'slug' => 'passport-issue-date',
                'name' => [
                    'uz'      => "Pasport berilgan sana",
                    'ru'      => 'Дата выдачи паспорта',
                    'en'      => 'Passport issue date',
                    'default' => 'Passport issue date',
                ],
            ],
            [
                'slug' => 'passport-validity-period',
                'name' => [
                    'uz'      => "Pasportning amal qilish muddati",
                    'ru'      => 'Срок действия паспорта',
                    'en'      => 'Passport validity period',
                    'default' => 'Passport validity period',
                ],
            ],
            [
                'slug' => 'passport-issuing-authority',
                'name' => [
                    'uz'      => "Pasport beruvchi organ",
                    'ru'      => 'Орган выдачи паспорта',
                    'en'      => 'Passport issuing authority',
                    'default' => 'Passport issuing authority',
                ],
            ],
            [
                'slug' => 'copy-of-passport',
                'name' => [
                    'uz'      => "Pasport nusxasi",
                    'ru'      => 'Копия паспорта',
                    'en'      => 'Copy of passport',
                    'default' => 'Copy of passport',
                ],
            ],
            [
                'slug' => 'no-data',
                'name' => [
                    'uz'      => "Ma'lumot yo'q",
                    'ru'      => 'Нет данных',
                    'en'      => 'No data',
                    'default' => 'No data',
                ],
            ],
            [
                'slug' => 'phone',
                'name' => [
                    'uz'      => "Telefon",
                    'ru'      => 'Телефон',
                    'en'      => 'Phone',
                    'default' => 'Phone',
                ],
            ],
            [
                'slug' => 'photo',
                'name' => [
                    'uz'      => "Fotosurat",
                    'ru'      => 'Фотография',
                    'en'      => 'Photo',
                    'default' => 'Photo',
                ],
            ],
            [
                'slug' => 'no-photo',
                'name' => [
                    'uz'      => "Fotosurat yo'q",
                    'ru'      => 'Нет фотографии',
                    'en'      => 'No photo',
                    'default' => 'No photo',
                ],
            ],
            [
                'slug' => 'yes',
                'name' => [
                    'uz'      => "Ha",
                    'ru'      => 'Да',
                    'en'      => 'Yes',
                    'default' => 'Yes',
                ],
            ],
            [
                'slug' => 'no',
                'name' => [
                    'uz'      => "Yo'q",
                    'ru'      => 'Нет',
                    'en'      => 'No',
                    'default' => 'No',
                ],
            ],
            [
                'slug' => 'accommodation-details',
                'name' => [
                    'uz'      => "Yashash joyi tafsilotlari",
                    'ru'      => 'Детали проживания',
                    'en'      => 'Accommodation details',
                    'default' => 'Accommodation details',
                ],
            ],
            [
                'slug' => 'pcr-test-details',
                'name' => [
                    'uz'      => "PCR test tafsilotlari",
                    'ru'      => 'Детали ПЦР-теста',
                    'en'      => 'PCR test details',
                    'default' => 'PCR test details',
                ],
            ],
            [
                'slug' => 'reason-for-cancellation',
                'name' => [
                    'uz'      => "Bekor qilish sababi",
                    'ru'      => 'Причина отмены',
                    'en'      => 'Reason for cancellation',
                    'default' => 'Reason for cancellation',
                ],
            ],
            [
                'slug' => 'close',
                'name' => [
                    'uz'      => "Yopish",
                    'ru'      => 'Закрыть',
                    'en'      => 'Close',
                    'default' => 'Close',
                ],
            ],
            [
                'slug' => 'confirm',
                'name' => [
                    'uz'      => "Tasdiqlash",
                    'ru'      => 'Подтвердить',
                    'en'      => 'Confirm',
                    'default' => 'Confirm',
                ],
            ],
            [
                'slug' => 'acceptance',
                'name' => [
                    'uz'      => "Qabul qilish",
                    'ru'      => 'Принятие',
                    'en'      => 'Acceptance',
                    'default' => 'Acceptance',
                ],
            ],
            [
                'slug' => 'canceled',
                'name' => [
                    'uz'      => "Bekor qilingan",
                    'ru'      => 'Отменено',
                    'en'      => 'Canceled',
                    'default' => 'Canceled',
                ],
            ],
            [
                'slug' => 'role',
                'name' => [
                    'uz'      => "Rol",
                    'ru'      => 'Роль',
                    'en'      => 'Role',
                    'default' => 'Role',
                ],
            ],
            [
                'slug' => 'users',
                'name' => [
                    'uz'      => "Foydalanuvchilar",
                    'ru'      => 'Пользователи',
                    'en'      => 'Users',
                    'default' => 'Users',
                ],
            ],
            [
                'slug' => 'do-you-want-to-delete',
                'name' => [
                    'uz'      => "O'chirishni xohlaysizmi?",
                    'ru'      => 'Хотите удалить?',
                    'en'      => 'Do you want to delete?',
                    'default' => 'Do you want to delete?',
                ],
            ],
            [
                'slug' => 'assets',
                'name' => [
                    'uz'      => "Aktivlar",
                    'ru'      => 'Активы',
                    'en'      => 'Assets',
                    'default' => 'Assets',
                ],
            ],
            [
                'slug' => 'not-active',
                'name' => [
                    'uz'      => "Faol emas",
                    'ru'      => 'Не активен',
                    'en'      => 'Not active',
                    'default' => 'Not active',
                ],
            ],
            [
                'slug' => 'password',
                'name' => [
                    'uz'      => "Parol",
                    'ru'      => 'Пароль',
                    'en'      => 'Password',
                    'default' => 'Password',
                ],
            ],
            [
                'slug' => 'password_conf',
                'name' => [
                    'uz'      => "Parolni tasdiqlash",
                    'ru'      => 'Подтверждение пароля',
                    'en'      => 'Password confirmation',
                    'default' => 'Password confirmation',
                ],
            ],
            [
                'slug' => 'language',
                'name' => [
                    'uz'      => "Til",
                    'ru'      => 'Язык',
                    'en'      => 'Language',
                    'default' => 'Language',
                ],
            ],
            [
                'slug' => 'translations',
                'name' => [
                    'uz'      => "Tarjimalar",
                    'ru'      => 'Переводы',
                    'en'      => 'Translations',
                    'default' => 'Translations',
                ],
            ],
            [
                'slug' => 'hotels',
                'name' => [
                    'uz'      => "Mehmonxonalar",
                    'ru'      => 'Отели',
                    'en'      => 'Hotels',
                    'default' => 'Hotels',
                ],
            ],
            [
                'slug' => 'contacts',
                'name' => [
                    'uz'      => "Aloqalar",
                    'ru'      => 'Контакты',
                    'en'      => 'Contacts',
                    'default' => 'Contacts',
                ],
            ],
            [
                'slug' => 'path',
                'name' => [
                    'uz'      => "Yo'l",
                    'ru'      => 'Путь',
                    'en'      => 'Path',
                    'default' => 'Path',
                ],
            ],
            [
                'slug' => 'title',
                'name' => [
                    'uz'      => "Sarlavha",
                    'ru'      => 'Заголовок',
                    'en'      => 'Title',
                    'default' => 'Title',
                ],
            ],
            [
                'slug' => 'text',
                'name' => [
                    'uz'      => "Matn",
                    'ru'      => 'Текст',
                    'en'      => 'Text',
                    'default' => 'Text',
                ],
            ],
            [
                'slug' => 'rating',
                'name' => [
                    'uz'      => "Reyting",
                    'ru'      => 'Рейтинг',
                    'en'      => 'Rating',
                    'default' => 'Rating',
                ],
            ],
            [
                'slug' => 'location',
                'name' => [
                    'uz'      => "Manzil",
                    'ru'      => 'Местоположение',
                    'en'      => 'Location',
                    'default' => 'Location',
                ],
            ],
            [
                'slug' => 'news',
                'name' => [
                    'uz'      => "Yangiliklar",
                    'ru'      => 'Новости',
                    'en'      => 'News',
                    'default' => 'News',
                ],
            ],
            [
                'slug' => 'accreditation-categories',
                'name' => [
                    'uz'      => "Akkreditatsiya kategoriyalari",
                    'ru'      => 'Категории аккредитации',
                    'en'      => 'Accreditation categories',
                    'default' => 'Accreditation categories',
                ],
            ],
            [
                'slug' => 'search',
                'name' => [
                    'uz'      => "Qidirish",
                    'ru'      => 'Поиск',
                    'en'      => 'Search',
                    'default' => 'Search',
                ],
            ],
            [
                'slug' => 'M',
                'name' => [
                    'uz'      => "Erkak",
                    'ru'      => 'Мужчина',
                    'en'      => 'Male',
                    'default' => 'Male',
                ],
            ],
            [
                'slug' => 'L',
                'name' => [
                    'uz'      => "Ayol",
                    'ru'      => 'Женщина',
                    'en'      => 'Female',
                    'default' => 'Female',
                ],
            ],
            [
                'slug' => 'unfinished',
                'name' => [
                    'uz'      => "Tugallanmagan",
                    'ru'      => 'Незаконченный',
                    'en'      => 'Unfinished',
                    'default' => 'Unfinished',
                ],
            ],
            [
                'slug' => 'pending',
                'name' => [
                    'uz'      => "Kutilmoqda",
                    'ru'      => 'Ожидающий',
                    'en'      => 'Pending',
                    'default' => 'Pending',
                ],
            ],
            [
                'slug' => 'ongoing',
                'name' => [
                    'uz'      => "Davom etmoqda",
                    'ru'      => 'Продолжающийся',
                    'en'      => 'Ongoing',
                    'default' => 'Ongoing',
                ],
            ],
            [
                'slug' => 'approved',
                'name' => [
                    'uz'      => "Tasdiqlangan",
                    'ru'      => 'Одобренный',
                    'en'      => 'Approved',
                    'default' => 'Approved',
                ],
            ],
            [
                'slug' => 'completed',
                'name' => [
                    'uz'      => "Yakunlangan",
                    'ru'      => 'Завершённый',
                    'en'      => 'Completed',
                    'default' => 'Completed',
                ],
            ],
            [
                'slug' => 'logout',
                'name' => [
                    'uz'      => "Chiqish",
                    'ru'      => 'Выход',
                    'en'      => 'Logout',
                    'default' => 'Logout',
                ],
            ],
            [
                'slug' => 'menus',
                'name' => [
                    'uz'      => "Menyular",
                    'ru'      => 'Меню',
                    'en'      => 'Menus',
                    'default' => 'Menus',
                ],
            ],
            [
                'slug' => 'partners',
                'name' => [
                    'uz'      => "Hamkorlar",
                    'ru'      => 'Партнёры',
                    'en'      => 'Partners',
                    'default' => 'Partners',
                ],
            ],
            [
                'slug' => 'my_profile',
                'name' => [
                    'uz'      => "Mening profilim",
                    'ru'      => 'Мой профиль',
                    'en'      => 'My profile',
                    'default' => 'My profile',
                ],
            ],
            [
                'slug' => 'notification',
                'name' => [
                    'uz'      => "Amal muvaffaqiyatli bajarildi!",
                    'ru'      => 'Действие успешно выполнено!',
                    'en'      => 'The action was successfully completed!',
                    'default' => 'The action was successfully completed!',
                ],
            ],
            [
                'slug' => 'scanner',
                'name' => [
                    'uz'      => "Skaner",
                    'ru'      => 'Сканер',
                    'en'      => 'Scanner',
                    'default' => 'Scanner',
                ],
            ],
            [
                'slug' => 'qk_code',
                'name' => [
                    'uz'      => "QR kod",
                    'ru'      => 'QR-код',
                    'en'      => 'QR Code',
                    'default' => 'QR Code',
                ],
            ],
            [
                'slug' => 'scanner_messages',
                'name' => [
                    'uz'      => "Bunday ishtirokchi mavjud emas!",
                    'ru'      => 'Такого участника не существует!',
                    'en'      => 'Such a participant does not exist!',
                    'default' => 'Such a participant does not exist!',
                ],
            ],
            [
                'slug' => 'media',
                'name' => [
                    'uz'      => "Media",
                    'ru'      => 'Медиа',
                    'en'      => 'Media',
                    'default' => 'Media',
                ],
            ],
            [
                'slug' => 'presence',
                'name' => [
                    'uz'      => "Davomat",
                    'ru'      => 'Присутствие',
                    'en'      => 'Presence',
                    'default' => 'Presence',
                ],
            ],
            [
                'slug' => 'back',
                'name' => [
                    'uz'      => "Orqaga",
                    'ru'      => 'Назад',
                    'en'      => 'Back',
                    'default' => 'Back',
                ],
            ],
            [
                'slug' => 'created',
                'name' => [
                    'uz'      => "Yaratilgan",
                    'ru'      => 'Создано',
                    'en'      => 'Created',
                    'default' => 'Created',
                ],
            ],
            [
                'slug' => 'code_verifay',
                'name' => [
                    'uz'      => "Tasdiq kodi",
                    'ru'      => 'Код подтверждения',
                    'en'      => 'Verification Code',
                    'default' => 'Verification Code',
                ],
            ],
            [
                'slug' => 'i_agree',
                'name' => [
                    'uz'      => "Men FIDE 46-Shaxmat Olimpiadasining Shartlari va Maxfiylik siyosatiga, shu jumladan akkreditatsiya va tadbirda ishtirok etish uchun shaxsiy ma'lumotlarimni qayta ishlashga roziman.",
                    'ru'      => "Я согласен с Условиями и Политикой конфиденциальности 46-й Шахматной Олимпиады ФИДЕ, включая обработку моих персональных данных для аккредитации и участия в мероприятии.",
                    'en'      => "I agree to the Terms & Conditions and Privacy Policy of the 46th FIDE Chess Olympiad, including the processing of my personal data for accreditation and event participation.",
                    'default' => "I agree to the Terms & Conditions and Privacy Policy of the 46th FIDE Chess Olympiad, including the processing of my personal data for accreditation and event participation.",
                ],
            ],
            [
                'slug' => 'personal_info',
                'name' => [
                    'uz'      => "Shaxsiy ma'lumotlar",
                    'ru'      => 'Персональная информация',
                    'en'      => 'Personal Information',
                    'default' => 'Personal Information',
                ],
            ],
            [
                'slug' => 'register_for_accreditation',
                'name' => [
                    'uz'      => "Akkreditatsiya uchun ro'yxatdan o'tish",
                    'ru'      => 'Зарегистрироваться для аккредитации',
                    'en'      => 'Register for Accreditation',
                    'default' => 'Register for Accreditation',
                ],
            ],
            [
                'slug' => 'in_passport',
                'name' => [
                    'uz'      => "Pasportdagi kabi",
                    'ru'      => 'Как в паспорте',
                    'en'      => 'As in passport',
                    'default' => 'As in passport',
                ],
            ],
            [
                'slug' => 'latest_news',
                'name' => [
                    'uz'      => "So'nggi yangiliklar",
                    'ru'      => 'Последние новости',
                    'en'      => 'Latest News',
                    'default' => 'Latest News',
                ],
            ],
            [
                'slug' => 'hotel_title',
                'name' => [
                    'uz'      => "Mehmonxonangizdan rohatlaning va qadimiy Samarqandni kashf eting",
                    'ru'      => "Наслаждайтесь пребыванием и исследуйте древний Самарканд",
                    'en'      => 'Enjoy Your Stay & Explore Ancient Samarkand',
                    'default' => 'Enjoy Your Stay & Explore Ancient Samarkand',
                ],
            ],
            [
                'slug' => 'hotel_description',
                'name' => [
                    'uz'      => "Samarqandning go'zalliklarini his qilib, tadbir o'tkaziladigan joy yaqinidagi yuqori baholangan mehmonxonalarda qoling.",
                    'ru'      => "Получите максимум удовольствия от визита, остановившись в лучших отелях недалеко от места проведения мероприятия и любуясь красотами Самарканда.",
                    'en'      => 'Make the most of your visit by staying at top-rated hotels near the event venue while experiencing the beauty of Samarkand.',
                    'default' => 'Make the most of your visit by staying at top-rated hotels near the event venue while experiencing the beauty of Samarkand.',
                ],
            ],
            [
                'slug' => 'read_more',
                'name' => [
                    'uz'      => "Ko'proq o'qish",
                    'ru'      => 'Читать далее',
                    'en'      => 'Read more',
                    'default' => 'Read more',
                ],
            ],
            [
                'slug' => 'back_to_homepage',
                'name' => [
                    'uz'      => "Bosh sahifaga qaytish",
                    'ru'      => 'Вернуться на главную страницу',
                    'en'      => 'Back to Homepage',
                    'default' => 'Back to Homepage',
                ],
            ],
            [
                'slug' => 'register_event',
                'name' => [
                    'uz'      => "Tadbirga ro'yxatdan o'tish",
                    'ru'      => 'Зарегистрироваться на мероприятие',
                    'en'      => 'Register for the event',
                    'default' => 'Register for the event',
                ],
            ],
            [
                'slug' => 'register_event_fide_id',
                'name' => [
                    'uz'      => "Ro'yxatdan o'tish sahifasiga o'tish uchun FIDE ID-ni kiriting",
                    'ru'      => 'Введите ваш FIDE ID для перехода на страницу регистрации',
                    'en'      => 'Please input your FIDE ID to proceed to the registration page',
                    'default' => 'Please input your FIDE ID to proceed to the registration page',
                ],
            ],
            [
                'slug' => 'footer_text',
                'name' => [
                    'uz'      => "Mualliflik huquqi 2025 O'zbekiston Shaxmat Federatsiyasi va FIDE Xalqaro Shaxmat Federatsiyasi. Barcha huquqlar himoyalangan.",
                    'ru'      => 'Авторские права 2025 Узбекистанская шахматная федерация и Международная шахматная федерация ФИДЕ. Все права защищены.',
                    'en'      => 'Copyrights 2025 Uzbekistan Chess Federation & FIDE International Chess Federation. All Rights Reserved.',
                    'default' => 'Copyrights 2025 Uzbekistan Chess Federation & FIDE International Chess Federation. All Rights Reserved.',
                ],
            ],
            [
                'slug' => 'standard_rating',
                'name' => [
                    'uz'      => "Standart reyting",
                    'ru'      => 'Стандартный рейтинг',
                    'en'      => 'Standard Rating',
                    'default' => 'Standard Rating',
                ],
            ],
            [
                'slug' => 'blitz_rating',
                'name' => [
                    'uz'      => "Blits reyting",
                    'ru'      => 'Блиц-рейтинг',
                    'en'      => 'Blitz Rating',
                    'default' => 'Blitz Rating',
                ],
            ],
            [
                'slug' => 'rapid_rating',
                'name' => [
                    'uz'      => "Tezkor reyting",
                    'ru'      => 'Рапид-рейтинг',
                    'en'      => 'Rapid Rating',
                    'default' => 'Rapid Rating',
                ],
            ],
            [
                'slug' => 'not_available',
                'name' => [
                    'uz'      => "Mavjud emas",
                    'ru'      => 'Недоступно',
                    'en'      => 'Not available',
                    'default' => 'Not available',
                ],
            ],
            [
                'slug' => 'm',
                'name' => [
                    'uz'      => "Erkak",
                    'ru'      => 'Мужчина',
                    'en'      => 'Male',
                    'default' => 'Male',
                ],
            ],
            [
                'slug' => 'f',
                'name' => [
                    'uz'      => "Ayol",
                    'ru'      => 'Женщина',
                    'en'      => 'Female',
                    'default' => 'Female',
                ],
            ],
            [
                'slug' => 'register_as_guest',
                'name' => [
                    'uz'      => "Mehmon sifatida ro'yxatdan o'tish",
                    'ru'      => 'Зарегистрироваться как гость',
                    'en'      => 'Register as a guest',
                    'default' => 'Register as a guest',
                ],
            ],
            [
                'slug' => 'check',
                'name' => [
                    'uz'      => "Tekshirish",
                    'ru'      => 'Проверить',
                    'en'      => 'Check',
                    'default' => 'Check',
                ],
            ],
            [
                'slug' => 'photo_for_accreditation',
                'name' => [
                    'uz'      => "Akkreditatsiya uchun rasm",
                    'ru'      => "Фото для аккредитации",
                    'en'      => "Photo for Accreditation",
                    'default' => 'Photo for Accreditation',
                ],
            ],
            [
                'slug' => 'date',
                'name' => [
                    'uz'      => "date",
                    'ru'      => "date",
                    'en'      => "date",
                    'default' => 'date',
                ],
            ],
            [
                'slug' => 'setting',
                'name' => [
                    'uz'      => "Sozlama",
                    'ru'      => "Настройки",
                    'en'      => "Settings",
                    'default' => 'Settings',
                ],
            ],
            [
                'slug' => 'action_button',
                'name' => [
                    'uz'      => "Проверить",
                    'ru'      => "Проверить",
                    'en'      => "Проверить",
                    'default' => 'Проверить',
                ],
            ],
            [
                'slug' => 'key',
                'name' => [
                    'uz'      => "Ключ",
                    'ru'      => "Ключ",
                    'en'      => "Ключ",
                    'default' => 'Ключ',
                ],
            ],
            [
                'slug' => 'aferta',
                'name' => [
                    'uz'      => "Aferta",
                    'ru'      => "Aferta",
                    'en'      => "Aferta",
                    'default' => 'Aferta',
                ],
            ],
            [
                'slug' => 'fide_id_success',
                'name' => [
                    'uz'      => "FIDE ID to‘g‘ri! Ro‘yxatdan o‘tish davom etmoqda.",
                    'ru'      => "FIDE ID верный! Регистрация продолжается.",
                    'en'      => "FIDE ID is correct! Registration is continuing.",
                    'default' => "FIDE ID is correct! Registration is continuing.",
                ],
            ],

            [
                'slug' => 'fide_id',
                'name' => [
                    'uz'      => "FIDE ID noto‘g‘ri! Iltimos, qayta tekshirib kiriting.",
                    'ru'      => "Неверный FIDE ID! Пожалуйста, проверьте и введите заново.",
                    'en'      => "Invalid FIDE ID! Please check and enter again.",
                    'default' => "Invalid FIDE ID! Please check and enter again.",
                ],
            ],

            [
                'slug' => 'message',
                'name' => [
                    'uz'      => "Emailga ID va Key yuborildi. 5 daqiqa ichida tasdiqlashingiz kerak!",
                    'ru'      => "ID и ключ были отправлены на вашу электронную почту. Вам нужно подтвердить их в течение 5 минут!",
                    'en'      => "ID and Key have been sent to your email. You must verify them within 5 minutes!",
                    'default' => "ID and Key have been sent to your email. You must verify them within 5 minutes!",
                ],
            ],
            [
                'slug' => 'color',
                'name' => [
                    'uz'      => "Color",
                    'ru'      => "Color",
                    'en'      => "Color",
                    'default' => "Color",
                ],
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
