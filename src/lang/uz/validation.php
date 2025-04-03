<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validatsiya Xabarlari
    |--------------------------------------------------------------------------
    |
    | Quyidagi til satrlari validator klass tomonidan ishlatiladigan standart
    | xato xabarlarini o'z ichiga oladi. Ba'zi qoidalarning bir nechta versiyalari
    | mavjud, masalan, o'lcham qoidalari. Har bir xabarni o'zingiz moslab o'zgartirishingiz mumkin.
    |
    */

    'accepted'               => 'Qabul qilinishi kerak.',
    'accepted_if'            => ':other :value boʻlganda qabul qilinishi kerak.',
    'active_url'             => 'Haqiqiy URL manzil boʻlishi kerak.',
    'after'                  => ':date dan keyingi sana boʻlishi kerak.',
    'after_or_equal'         => ':date dan keyingi yoki teng sana boʻlishi kerak.',
    'alpha'                  => 'Faqat harflardan iborat boʻlishi kerak.',
    'alpha_dash'             => 'Faqat harflar, raqamlar, chiziqcha va pastki chiziqlardan iborat boʻlishi kerak.',
    'alpha_num'              => 'Faqat harflar va raqamlardan iborat boʻlishi kerak.',
    'array'                  => 'Massiv boʻlishi kerak.',
    'ascii'                  => 'Faqat bir baytli alfanumerik belgilar va simvollardan iborat boʻlishi kerak.',
    'before'                 => ':date dan oldingi sana boʻlishi kerak.',
    'before_or_equal'        => ':date dan oldingi yoki teng sana boʻlishi kerak.',
    'between'                => [
        'array'   => ':min dan :max gacha elementlardan iborat boʻlishi kerak.',
        'file'    => ':min dan :max gacha kilobayt boʻlishi kerak.',
        'numeric' => ':min dan :max gacha boʻlishi kerak.',
        'string'  => ':min dan :max gacha belgidan iborat boʻlishi kerak.',
    ],
    'boolean'                => 'Maydoni true yoki false boʻlishi kerak.',
    'can'                    => 'Maydoni ruxsat etilmagan qiymatni oʻz ichiga oladi.',
    'confirmed'              => 'Tasdiqlash mos kelmadi.',
    'contains'               => 'Maydonida talab qilinadigan qiymat yoʻq.',
    'current_password'       => 'Parol notoʻgʻri.',
    'date'                   => 'Haqiqiy sana boʻlishi kerak.',
    'date_equals'            => ':date ga teng sana boʻlishi kerak.',
    'date_format'            => ':format formatiga mos kelishi kerak.',
    'decimal'                => ':decimal kasr joylariga ega boʻlishi kerak.',
    'declined'               => 'rad etilishi kerak.',
    'declined_if'            => ':other :value boʻlganda rad etilishi kerak.',
    'different'              => 'va :other farqli boʻlishi kerak.',
    'digits'                 => ':digits raqamdan iborat boʻlishi kerak.',
    'digits_between'         => ':min dan :max gacha raqamlardan iborat boʻlishi kerak.',
    'dimensions'             => 'notoʻgʻri rasm oʻlchamlariga ega.',
    'distinct'               => 'Maydonida takroriy qiymat mavjud.',
    'doesnt_end_with'        => 'Quyidagilar bilan tugamashi kerak: :values.',
    'doesnt_start_with'      => 'Quyidagilar bilan boshlanmasligi kerak: :values.',
    'email'                  => 'Haqiqiy elektron pochta manzili boʻlishi kerak.',
    'ends_with'              => 'Quyidagilar bilan tugashi kerak: :values.',
    'enum'                   => 'Tanlangan yaroqsiz.',
    'exists'                 => 'Tanlangan yaroqsiz.',
    'extensions'             => 'Quyidagi kengaytmalardan biriga ega boʻlishi kerak: :values.',
    'file'                   => 'fayl boʻlishi kerak.',
    'filled'                 => 'Maydoni qiymatga ega boʻlishi kerak.',
    'gt'                     => [
        'array'   => ':value dan koʻp elementlardan iborat boʻlishi kerak.',
        'file'    => ':value kilobaytdan katta boʻlishi kerak.',
        'numeric' => ':value dan katta boʻlishi kerak.',
        'string'  => ':value belgidan uzun boʻlishi kerak.',
    ],
    'gte'                    => [
        'array'   => 'Kamida :value elementdan iborat boʻlishi kerak.',
        'file'    => 'Kamida :value kilobayt boʻlishi kerak.',
        'numeric' => 'Kamida :value boʻlishi kerak.',
        'string'  => 'Kamida :value belgidan iborat boʻlishi kerak.',
    ],
    'hex_color'              => 'Haqiqiy hex rangi boʻlishi kerak.',
    'image'                  => 'Rasm boʻlishi kerak.',
    'in'                     => 'Tanlangan yaroqsiz.',
    'in_array'               => 'Maydoni :other da mavjud boʻlishi kerak.',
    'integer'                => 'Butun son boʻlishi kerak.',
    'ip'                     => 'Haqiqiy IP manzil boʻlishi kerak.',
    'ipv4'                   => 'Haqiqiy IPv4 manzil boʻlishi kerak.',
    'ipv6'                   => 'Haqiqiy IPv6 manzil boʻlishi kerak.',
    'json'                   => 'Haqiqiy JSON satri boʻlishi kerak.',
    'list'                   => 'Roʻyxat boʻlishi kerak.',
    'lowercase'              => 'Kichik harflarda boʻlishi kerak.',
    'lt'                     => [
        'array'   => ':value dan kam elementlardan iborat boʻlishi kerak.',
        'file'    => ':value kilobaytdan kichik boʻlishi kerak.',
        'numeric' => ':value dan kichik boʻlishi kerak.',
        'string'  => ':value belgidan qisqa boʻlishi kerak.',
    ],
    'lte'                    => [
        'array'   => ':value dan ortiq elementlardan iborat boʻlmasligi kerak.',
        'file'    => ':value kilobayt yoki undan kichik boʻlishi kerak.',
        'numeric' => ':value yoki undan kichik boʻlishi kerak.',
        'string'  => ':value belgidan uzun boʻlmasligi kerak.',
    ],
    'mac_address'            => 'Haqiqiy MAC manzil boʻlishi kerak.',
    'max'                    => [
        'array'   => ':max tadan ortiq elementlardan iborat boʻlmasligi kerak.',
        'file'    => ':max kilobaytdan katta boʻlmasligi kerak.',
        'numeric' => ':max dan katta boʻlmasligi kerak.',
        'string'  => ':max belgidan uzun boʻlmasligi kerak.',
    ],
    'max_digits'             => ':max raqamdan ortiq boʻlmasligi kerak.',
    'mimes'                  => 'Quyidagi turdagi fayl boʻlishi kerak: :values.',
    'mimetypes'              => 'Quyidagi turdagi fayl boʻlishi kerak: :values.',
    'min'                    => [
        'array'   => 'Kamida :min elementdan iborat boʻlishi kerak.',
        'file'    => 'Kamida :min kilobayt boʻlishi kerak.',
        'numeric' => 'Kamida :min boʻlishi kerak.',
        'string'  => 'Kamida :min belgidan iborat boʻlishi kerak.',
    ],
    'min_digits'             => 'Kamida :min raqamdan iborat boʻlishi kerak.',
    'missing'                => 'Maydoni yoʻq boʻlishi kerak.',
    'missing_if'             => ':other :value boʻlganda maydoni yoʻq boʻlishi kerak.',
    'missing_unless'         => ':other :value boʻlmasa maydoni yoʻq boʻlishi kerak.',
    'missing_with'           => ':values mavjud boʻlganda maydoni yoʻq boʻlishi kerak.',
    'missing_with_all'       => ':values mavjud boʻlganda maydoni yoʻq boʻlishi kerak.',
    'multiple_of'            => ':value ga karrali boʻlishi kerak.',
    'not_in'                 => 'Tanlangan yaroqsiz.',
    'not_regex'              => 'formati yaroqsiz.',
    'numeric'                => 'raqam boʻlishi kerak.',
    'password'               => [
        'letters'       => 'Kamida bitta harfdan iborat boʻlishi kerak.',
        'mixed'         => 'Kamida bitta katta va bitta kichik harfdan iborat boʻlishi kerak.',
        'numbers'       => 'Kamida bitta raqamdan iborat boʻlishi kerak.',
        'symbols'       => 'Kamida bitta belgidan iborat boʻlishi kerak.',
        'uncompromised' => 'Berilgan maʼlumotlar sizilishida paydo boʻlgan. Iltimos, boshqa tanlang.',
    ],
    'present'                => 'Maydoni mavjud boʻlishi kerak.',
    'present_if'             => ':other :value boʻlganda maydoni mavjud boʻlishi kerak.',
    'present_unless'         => ':other :value boʻlmasa maydoni mavjud boʻlishi kerak.',
    'present_with'           => ':values mavjud boʻlganda maydoni mavjud boʻlishi kerak.',
    'present_with_all'       => ':values mavjud boʻlganda maydoni mavjud boʻlishi kerak.',
    'prohibited'             => 'Maydoni taqiqlangan.',
    'prohibited_if'          => ':other :value boʻlganda maydoni taqiqlangan.',
    'prohibited_if_accepted' => ':other qabul qilinganda maydoni taqiqlangan.',
    'prohibited_if_declined' => ':other rad etilganda maydoni taqiqlangan.',
    'prohibited_unless'      => ':other :values ichida boʻlmasa maydoni taqiqlangan.',
    'prohibits'              => 'Maydoni :other ning mavjudligini taqiqlaydi.',
    'regex'                  => 'formati yaroqsiz.',
    'required'               => 'Maydoni toʻldirilishi shart.',
    'required_array_keys'    => 'Maydoni quyidagi kalitlarni oʻz ichiga olishi kerak: :values.',
    'required_if'            => ':other :value boʻlganda maydoni toʻldirilishi shart.',
    'required_if_accepted'   => ':other qabul qilinganda maydoni toʻldirilishi shart.',
    'required_if_declined'   => ':other rad etilganda maydoni toʻldirilishi shart.',
    'required_unless'        => ':other :values ichida boʻlmasa maydoni toʻldirilishi shart.',
    'required_with'          => ':values mavjud boʻlganda maydoni toʻldirilishi shart.',
    'required_with_all'      => ':values mavjud boʻlganda maydoni toʻldirilishi shart.',
    'required_without'       => ':values mavjud boʻlmaganda maydoni toʻldirilishi shart.',
    'required_without_all'   => ':values lardan hech biri mavjud boʻlmaganda maydoni toʻldirilishi shart.',
    'same'                   => 'va mos kelishi kerak.',
    'size'                   => [
        'array'   => ':size elementdan iborat boʻlishi kerak.',
        'file'    => ':size kilobayt boʻlishi kerak.',
        'numeric' => ':size boʻlishi kerak.',
        'string'  => ':size belgidan iborat boʻlishi kerak.',
    ],
    'starts_with'            => 'Quyidagilar bilan boshlanishi kerak: :values.',
    'string'                 => 'Satr boʻlishi kerak.',
    'timezone'               => 'Haqiqiy vaqt mintaqasi boʻlishi kerak.',
    'unique'                 => 'Allaqachon olingan.',
    'uploaded'               => 'Yuklash muvaffaqiyatsiz tugadi.',
    'uppercase'              => 'Katta harflarda boʻlishi kerak.',
    'url'                    => 'Haqiqiy URL boʻlishi kerak.',
    'ulid'                   => 'Haqiqiy ULID boʻlishi kerak.',
    'uuid'                   => 'Haqiqiy UUID boʻlishi kerak.',

    /*
    |--------------------------------------------------------------------------
    | Maxsus Validatsiya Xabarlari
    |--------------------------------------------------------------------------
    |
    | Bu yerda siz "attribute.rule" konventsiyasidan foydalanib, atributlar uchun
    | maxsus validatsiya xabarlarini belgilashingiz mumkin. Bu berilgan atribut
    | qoidasi uchun maxsus til satrini tezda belgilash imkonini beradi.
    |
    */

    'custom'                 => [
        'attribute-name' => [
            'rule-name' => 'maxsus-xabar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Maxsus Validatsiya Atributlari
    |--------------------------------------------------------------------------
    |
    | Quyidagi til satrlari bizning atribut placeholderlarini "Elektron pochta" kabi
    | o'quvchiga qulayroq narsalar bilan almashtirish uchun ishlatiladi.
    | Bu shunchaki xabarlarimizni yanada ifodali qilishga yordam beradi.
    |
    */

    'attributes'             => [],

];
