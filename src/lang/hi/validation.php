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

    'accepted'               => ':attribute qabul qilinishi kerak.',
    'accepted_if'            => ':other :value boʻlganda :attribute qabul qilinishi kerak.',
    'active_url'             => ':attribute haqiqiy URL manzil boʻlishi kerak.',
    'after'                  => ':attribute :date dan keyingi sana boʻlishi kerak.',
    'after_or_equal'         => ':attribute :date dan keyingi yoki teng sana boʻlishi kerak.',
    'alpha'                  => ':attribute faqat harflardan iborat boʻlishi kerak.',
    'alpha_dash'             => ':attribute faqat harflar, raqamlar, chiziqcha va pastki chiziqlardan iborat boʻlishi kerak.',
    'alpha_num'              => ':attribute faqat harflar va raqamlardan iborat boʻlishi kerak.',
    'array'                  => ':attribute massiv boʻlishi kerak.',
    'ascii'                  => ':attribute faqat bir baytli alfanumerik belgilar va simvollardan iborat boʻlishi kerak.',
    'before'                 => ':attribute :date dan oldingi sana boʻlishi kerak.',
    'before_or_equal'        => ':attribute :date dan oldingi yoki teng sana boʻlishi kerak.',
    'between'                => [
        'array'   => ':attribute :min dan :max gacha elementlardan iborat boʻlishi kerak.',
        'file'    => ':attribute :min dan :max gacha kilobayt boʻlishi kerak.',
        'numeric' => ':attribute :min dan :max gacha boʻlishi kerak.',
        'string'  => ':attribute :min dan :max gacha belgidan iborat boʻlishi kerak.',
    ],
    'boolean'                => ':attribute maydoni true yoki false boʻlishi kerak.',
    'can'                    => ':attribute maydoni ruxsat etilmagan qiymatni oʻz ichiga oladi.',
    'confirmed'              => ':attribute tasdiqlash mos kelmadi.',
    'contains'               => ':attribute maydonida talab qilinadigan qiymat yoʻq.',
    'current_password'       => 'Parol notoʻgʻri.',
    'date'                   => ':attribute haqiqiy sana boʻlishi kerak.',
    'date_equals'            => ':attribute :date ga teng sana boʻlishi kerak.',
    'date_format'            => ':attribute :format formatiga mos kelishi kerak.',
    'decimal'                => ':attribute :decimal kasr joylariga ega boʻlishi kerak.',
    'declined'               => ':attribute rad etilishi kerak.',
    'declined_if'            => ':other :value boʻlganda :attribute rad etilishi kerak.',
    'different'              => ':attribute va :other farqli boʻlishi kerak.',
    'digits'                 => ':attribute :digits raqamdan iborat boʻlishi kerak.',
    'digits_between'         => ':attribute :min dan :max gacha raqamlardan iborat boʻlishi kerak.',
    'dimensions'             => ':attribute notoʻgʻri rasm oʻlchamlariga ega.',
    'distinct'               => ':attribute maydonida takroriy qiymat mavjud.',
    'doesnt_end_with'        => ':attribute quyidagilar bilan tugamashi kerak: :values.',
    'doesnt_start_with'      => ':attribute quyidagilar bilan boshlanmasligi kerak: :values.',
    'email'                  => ':attribute haqiqiy elektron pochta manzili boʻlishi kerak.',
    'ends_with'              => ':attribute quyidagilar bilan tugashi kerak: :values.',
    'enum'                   => 'Tanlangan :attribute yaroqsiz.',
    'exists'                 => 'Tanlangan :attribute yaroqsiz.',
    'extensions'             => ':attribute quyidagi kengaytmalardan biriga ega boʻlishi kerak: :values.',
    'file'                   => ':attribute fayl boʻlishi kerak.',
    'filled'                 => ':attribute maydoni qiymatga ega boʻlishi kerak.',
    'gt'                     => [
        'array'   => ':attribute :value dan koʻp elementlardan iborat boʻlishi kerak.',
        'file'    => ':attribute :value kilobaytdan katta boʻlishi kerak.',
        'numeric' => ':attribute :value dan katta boʻlishi kerak.',
        'string'  => ':attribute :value belgidan uzun boʻlishi kerak.',
    ],
    'gte'                    => [
        'array'   => ':attribute kamida :value elementdan iborat boʻlishi kerak.',
        'file'    => ':attribute kamida :value kilobayt boʻlishi kerak.',
        'numeric' => ':attribute kamida :value boʻlishi kerak.',
        'string'  => ':attribute kamida :value belgidan iborat boʻlishi kerak.',
    ],
    'hex_color'              => ':attribute haqiqiy hex rangi boʻlishi kerak.',
    'image'                  => ':attribute rasm boʻlishi kerak.',
    'in'                     => 'Tanlangan :attribute yaroqsiz.',
    'in_array'               => ':attribute maydoni :other da mavjud boʻlishi kerak.',
    'integer'                => ':attribute butun son boʻlishi kerak.',
    'ip'                     => ':attribute haqiqiy IP manzil boʻlishi kerak.',
    'ipv4'                   => ':attribute haqiqiy IPv4 manzil boʻlishi kerak.',
    'ipv6'                   => ':attribute haqiqiy IPv6 manzil boʻlishi kerak.',
    'json'                   => ':attribute haqiqiy JSON satri boʻlishi kerak.',
    'list'                   => ':attribute roʻyxat boʻlishi kerak.',
    'lowercase'              => ':attribute kichik harflarda boʻlishi kerak.',
    'lt'                     => [
        'array'   => ':attribute :value dan kam elementlardan iborat boʻlishi kerak.',
        'file'    => ':attribute :value kilobaytdan kichik boʻlishi kerak.',
        'numeric' => ':attribute :value dan kichik boʻlishi kerak.',
        'string'  => ':attribute :value belgidan qisqa boʻlishi kerak.',
    ],
    'lte'                    => [
        'array'   => ':attribute :value dan ortiq elementlardan iborat boʻlmasligi kerak.',
        'file'    => ':attribute :value kilobayt yoki undan kichik boʻlishi kerak.',
        'numeric' => ':attribute :value yoki undan kichik boʻlishi kerak.',
        'string'  => ':attribute :value belgidan uzun boʻlmasligi kerak.',
    ],
    'mac_address'            => ':attribute haqiqiy MAC manzil boʻlishi kerak.',
    'max'                    => [
        'array'   => ':attribute :max tadan ortiq elementlardan iborat boʻlmasligi kerak.',
        'file'    => ':attribute :max kilobaytdan katta boʻlmasligi kerak.',
        'numeric' => ':attribute :max dan katta boʻlmasligi kerak.',
        'string'  => ':attribute :max belgidan uzun boʻlmasligi kerak.',
    ],
    'max_digits'             => ':attribute :max raqamdan ortiq boʻlmasligi kerak.',
    'mimes'                  => ':attribute quyidagi turdagi fayl boʻlishi kerak: :values.',
    'mimetypes'              => ':attribute quyidagi turdagi fayl boʻlishi kerak: :values.',
    'min'                    => [
        'array'   => ':attribute kamida :min elementdan iborat boʻlishi kerak.',
        'file'    => ':attribute kamida :min kilobayt boʻlishi kerak.',
        'numeric' => ':attribute kamida :min boʻlishi kerak.',
        'string'  => ':attribute kamida :min belgidan iborat boʻlishi kerak.',
    ],
    'min_digits'             => ':attribute kamida :min raqamdan iborat boʻlishi kerak.',
    'missing'                => ':attribute maydoni yoʻq boʻlishi kerak.',
    'missing_if'             => ':other :value boʻlganda :attribute maydoni yoʻq boʻlishi kerak.',
    'missing_unless'         => ':other :value boʻlmasa :attribute maydoni yoʻq boʻlishi kerak.',
    'missing_with'           => ':values mavjud boʻlganda :attribute maydoni yoʻq boʻlishi kerak.',
    'missing_with_all'       => ':values mavjud boʻlganda :attribute maydoni yoʻq boʻlishi kerak.',
    'multiple_of'            => ':attribute :value ga karrali boʻlishi kerak.',
    'not_in'                 => 'Tanlangan :attribute yaroqsiz.',
    'not_regex'              => ':attribute formati yaroqsiz.',
    'numeric'                => ':attribute raqam boʻlishi kerak.',
    'password'               => [
        'letters'       => ':attribute kamida bitta harfdan iborat boʻlishi kerak.',
        'mixed'         => ':attribute kamida bitta katta va bitta kichik harfdan iborat boʻlishi kerak.',
        'numbers'       => ':attribute kamida bitta raqamdan iborat boʻlishi kerak.',
        'symbols'       => ':attribute kamida bitta belgidan iborat boʻlishi kerak.',
        'uncompromised' => 'Berilgan :attribute maʼlumotlar sizilishida paydo boʻlgan. Iltimos, boshqa :attribute tanlang.',
    ],
    'present'                => ':attribute maydoni mavjud boʻlishi kerak.',
    'present_if'             => ':other :value boʻlganda :attribute maydoni mavjud boʻlishi kerak.',
    'present_unless'         => ':other :value boʻlmasa :attribute maydoni mavjud boʻlishi kerak.',
    'present_with'           => ':values mavjud boʻlganda :attribute maydoni mavjud boʻlishi kerak.',
    'present_with_all'       => ':values mavjud boʻlganda :attribute maydoni mavjud boʻlishi kerak.',
    'prohibited'             => ':attribute maydoni taqiqlangan.',
    'prohibited_if'          => ':other :value boʻlganda :attribute maydoni taqiqlangan.',
    'prohibited_if_accepted' => ':other qabul qilinganda :attribute maydoni taqiqlangan.',
    'prohibited_if_declined' => ':other rad etilganda :attribute maydoni taqiqlangan.',
    'prohibited_unless'      => ':other :values ichida boʻlmasa :attribute maydoni taqiqlangan.',
    'prohibits'              => ':attribute maydoni :other ning mavjudligini taqiqlaydi.',
    'regex'                  => ':attribute formati yaroqsiz.',
    'required'               => ':attribute maydoni toʻldirilishi shart.',
    'required_array_keys'    => ':attribute maydoni quyidagi kalitlarni oʻz ichiga olishi kerak: :values.',
    'required_if'            => ':other :value boʻlganda :attribute maydoni toʻldirilishi shart.',
    'required_if_accepted'   => ':other qabul qilinganda :attribute maydoni toʻldirilishi shart.',
    'required_if_declined'   => ':other rad etilganda :attribute maydoni toʻldirilishi shart.',
    'required_unless'        => ':other :values ichida boʻlmasa :attribute maydoni toʻldirilishi shart.',
    'required_with'          => ':values mavjud boʻlganda :attribute maydoni toʻldirilishi shart.',
    'required_with_all'      => ':values mavjud boʻlganda :attribute maydoni toʻldirilishi shart.',
    'required_without'       => ':values mavjud boʻlmaganda :attribute maydoni toʻldirilishi shart.',
    'required_without_all'   => ':values lardan hech biri mavjud boʻlmaganda :attribute maydoni toʻldirilishi shart.',
    'same'                   => ':attribute va :attribute mos kelishi kerak.',
    'size'                   => [
        'array'   => ':attribute :size elementdan iborat boʻlishi kerak.',
        'file'    => ':attribute :size kilobayt boʻlishi kerak.',
        'numeric' => ':attribute :size boʻlishi kerak.',
        'string'  => ':attribute :size belgidan iborat boʻlishi kerak.',
    ],
    'starts_with'            => ':attribute quyidagilar bilan boshlanishi kerak: :values.',
    'string'                 => ':attribute satr boʻlishi kerak.',
    'timezone'               => ':attribute haqiqiy vaqt mintaqasi boʻlishi kerak.',
    'unique'                 => ':attribute allaqachon olingan.',
    'uploaded'               => ':attribute yuklash muvaffaqiyatsiz tugadi.',
    'uppercase'              => ':attribute katta harflarda boʻlishi kerak.',
    'url'                    => ':attribute haqiqiy URL boʻlishi kerak.',
    'ulid'                   => ':attribute haqiqiy ULID boʻlishi kerak.',
    'uuid'                   => ':attribute haqiqiy UUID boʻlishi kerak.',

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
