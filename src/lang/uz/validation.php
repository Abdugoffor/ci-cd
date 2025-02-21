<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'               => ':attribute maydoni qabul qilinishi shart.',
    'accepted_if'            => ':other :value bo‘lganda :attribute maydoni qabul qilinishi shart.',
    'active_url'             => ':attribute maydoni haqiqiy URL bo‘lishi kerak.',
    'after'                  => ':attribute maydoni :date sanasidan keyingi sana bo‘lishi kerak.',
    'after_or_equal'         => ':attribute maydoni :date sanasidan keyin yoki unga teng bo‘lishi kerak.',
    'alpha'                  => ':attribute maydoni faqat harflardan iborat bo‘lishi kerak.',
    'alpha_dash'             => ':attribute maydoni faqat harflar, raqamlar, chiziqlar va pastki chiziqlardan iborat bo‘lishi kerak.',
    'alpha_num'              => ':attribute maydoni faqat harflar va raqamlardan iborat bo‘lishi kerak.',
    'array'                  => ':attribute maydoni massiv bo‘lishi kerak.',
    'ascii'                  => ':attribute maydoni faqat bitta baytlik alfanumerik belgilar va belgilardan iborat bo‘lishi kerak.',
    'before'                 => ':attribute maydoni :date sanasidan oldingi sana bo‘lishi kerak.',
    'before_or_equal'        => ':attribute maydoni :date sanasidan oldin yoki unga teng bo‘lishi kerak.',
    'between'                => [
        'array'   => ':attribute maydoni :min va :max elementlar orasida bo‘lishi kerak.',
        'file'    => ':attribute maydoni :min va :max kilobayt orasida bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :min va :max orasida bo‘lishi kerak.',
        'string'  => ':attribute maydoni :min va :max belgilar orasida bo‘lishi kerak.',
    ],
    'boolean'                => ':attribute maydoni true yoki false bo‘lishi kerak.',
    'can'                    => ':attribute maydonida ruxsat etilmagan qiymat bor.',
    'confirmed'              => ':attribute tasdiqlash maydoni mos kelmadi.',
    'contains'               => ':attribute maydonida talab qilingan qiymat yetishmayapti.',
    'current_password'       => 'Parol noto‘g‘ri.',
    'date'                   => ':attribute maydoni haqiqiy sana bo‘lishi kerak.',
    'date_equals'            => ':attribute maydoni :date sanasiga teng bo‘lishi kerak.',
    'date_format'            => ':attribute maydoni :format formatiga mos kelishi kerak.',
    'decimal'                => ':attribute maydoni :decimal o‘nlik xonaga ega bo‘lishi kerak.',
    'declined'               => ':attribute maydoni rad etilishi shart.',
    'declined_if'            => ':other :value bo‘lganda :attribute maydoni rad etilishi shart.',
    'different'              => ':attribute va :other maydonlari har xil bo‘lishi kerak.',
    'digits'                 => ':attribute maydoni :digits raqamdan iborat bo‘lishi kerak.',
    'digits_between'         => ':attribute maydoni :min va :max raqam orasida bo‘lishi kerak.',
    'dimensions'             => ':attribute maydonida noto‘g‘ri rasm o‘lchamlari mavjud.',
    'distinct'               => ':attribute maydonida takroriy qiymat bor.',
    'doesnt_end_with'        => ':attribute maydoni quyidagilardan biri bilan tugamasligi kerak: :values.',
    'doesnt_start_with'      => ':attribute maydoni quyidagilardan biri bilan boshlanmasligi kerak: :values.',
    'email'                  => ':attribute maydoni haqiqiy email manzil bo‘lishi kerak.',
    'ends_with'              => ':attribute maydoni quyidagilardan biri bilan tugashi kerak: :values.',
    'enum'                   => 'Tanlangan :attribute yaroqsiz.',
    'exists'                 => 'Tanlangan :attribute yaroqsiz.',
    'extensions'             => ':attribute maydoni quyidagi kengaytmalarni o‘z ichiga olishi kerak: :values.',
    'file'                   => ':attribute maydoni fayl bo‘lishi kerak.',
    'filled'                 => ':attribute maydonida qiymat bo‘lishi shart.',
    'gt'                     => [
        'array'   => ':attribute maydonida :value tadan ko‘p element bo‘lishi kerak.',
        'file'    => ':attribute maydoni :value kilobaytdan katta bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan katta bo‘lishi kerak.',
        'string'  => ':attribute maydoni :value belgidan katta bo‘lishi kerak.',
    ],
    'gte'                    => [
        'array'   => ':attribute maydonida kamida :value ta element bo‘lishi kerak.',
        'file'    => ':attribute maydoni :value kilobaytdan katta yoki teng bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan katta yoki teng bo‘lishi kerak.',
        'string'  => ':attribute maydoni :value belgidan katta yoki teng bo‘lishi kerak.',
    ],

    'hex_color'              => ':attribute maydoni yaroqli hexadecimall rang bo‘lishi kerak.',
    'image'                  => ':attribute maydoni rasm bo‘lishi kerak.',
    'in'                     => 'Tanlangan :attribute yaroqsiz.',
    'in_array'               => ':attribute maydoni :other da mavjud bo‘lishi kerak.',
    'integer'                => ':attribute maydoni butun son bo‘lishi kerak.',
    'ip'                     => ':attribute maydoni yaroqli IP manzil bo‘lishi kerak.',
    'ipv4'                   => ':attribute maydoni yaroqli IPv4 manzil bo‘lishi kerak.',
    'ipv6'                   => ':attribute maydoni yaroqli IPv6 manzil bo‘lishi kerak.',
    'json'                   => ':attribute maydoni yaroqli JSON qatori bo‘lishi kerak.',
    'list'                   => ':attribute maydoni ro‘yxat bo‘lishi kerak.',
    'lowercase'              => ':attribute maydoni kichik harflarda bo‘lishi kerak.',
    'lt'                     => [
        'array'   => ':attribute maydonida :value tadan kam element bo‘lishi kerak.',
        'file'    => ':attribute maydoni :value kilobaytdan kam bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan kam bo‘lishi kerak.',
        'string'  => ':attribute maydoni :value ta belgidan kam bo‘lishi kerak.',
    ],
    'lte'                    => [
        'array'   => ':attribute maydonida :value tadan ko‘p element bo‘lmasligi kerak.',
        'file'    => ':attribute maydoni :value kilobaytdan kam yoki teng bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan kam yoki teng bo‘lishi kerak.',
        'string'  => ':attribute maydoni :value ta belgidan kam yoki teng bo‘lishi kerak.',
    ],
    'mac_address'            => ':attribute maydoni yaroqli MAC manzil bo‘lishi kerak.',
    'max'                    => [
        'array'   => ':attribute maydonida :max tadan ko‘p element bo‘lmasligi kerak.',
        'file'    => ':attribute maydoni :max kilobaytdan katta bo‘lmasligi kerak.',
        'numeric' => ':attribute maydoni :max dan katta bo‘lmasligi kerak.',
        'string'  => ':attribute maydoni :max ta belgidan katta bo‘lmasligi kerak.',
    ],
    'max_digits'             => ':attribute maydoni :max ta raqamdan ko‘p bo‘lmasligi kerak.',
    'mimes'                  => ':attribute maydoni quyidagi fayl turlaridan biri bo‘lishi kerak: :values.',
    'mimetypes'              => ':attribute maydoni quyidagi fayl turlaridan biri bo‘lishi kerak: :values.',
    'min'                    => [
        'array'   => ':attribute maydonida kamida :min ta element bo‘lishi kerak.',
        'file'    => ':attribute maydoni kamida :min kilobayt bo‘lishi kerak.',
        'numeric' => ':attribute maydoni kamida :min bo‘lishi kerak.',
        'string'  => ':attribute maydoni kamida :min ta belgidan iborat bo‘lishi kerak.',
    ],

    'min_digits'             => ':Attribute maydoni kamida :min raqamdan iborat bo‘lishi kerak.',
    'missing'                => ':Attribute maydoni mavjud bo‘lmasligi kerak.',
    'missing_if'             => ':Other :value bo‘lsa, :attribute maydoni mavjud bo‘lmasligi kerak.',
    'missing_unless'         => ':Other :value bo‘lmasa, :attribute maydoni mavjud bo‘lmasligi kerak.',
    'missing_with'           => ':Values mavjud bo‘lsa, :attribute maydoni mavjud bo‘lmasligi kerak.',
    'missing_with_all'       => ':Values mavjud bo‘lsa, :attribute maydoni mavjud bo‘lmasligi kerak.',
    'multiple_of'            => ':Attribute maydoni :value ning ko‘paytmasi bo‘lishi kerak.',
    'not_in'                 => 'Tanlangan :attribute yaroqsiz.',
    'not_regex'              => ':Attribute maydoni noto‘g‘ri formatda.',
    'numeric'                => ':Attribute maydoni son bo‘lishi kerak.',
    'password'               => [
        'letters'       => ':Attribute maydonida kamida bitta harf bo‘lishi kerak.',
        'mixed'         => ':Attribute maydonida kamida bitta katta va bitta kichik harf bo‘lishi kerak.',
        'numbers'       => ':Attribute maydonida kamida bitta raqam bo‘lishi kerak.',
        'symbols'       => ':Attribute maydonida kamida bitta belgi bo‘lishi kerak.',
        'uncompromised' => 'Ushbu :attribute ma’lumotlar sizib chiqishida ishtirok etgan. Iltimos, boshqa :attribute tanlang.',
    ],
    'present'                => ':Attribute maydoni mavjud bo‘lishi kerak.',
    'present_if'             => ':Other :value bo‘lsa, :attribute maydoni mavjud bo‘lishi kerak.',
    'present_unless'         => ':Other :value bo‘lmasa, :attribute maydoni mavjud bo‘lishi kerak.',
    'present_with'           => ':Values mavjud bo‘lsa, :attribute maydoni mavjud bo‘lishi kerak.',
    'present_with_all'       => ':Values mavjud bo‘lsa, :attribute maydoni mavjud bo‘lishi kerak.',
    'prohibited'             => ':Attribute maydonidan foydalanish taqiqlangan.',
    'prohibited_if'          => ':Other :value bo‘lsa, :attribute maydonidan foydalanish taqiqlangan.',
    'prohibited_if_accepted' => ':Other qabul qilingan bo‘lsa, :attribute maydonidan foydalanish taqiqlangan.',
    'prohibited_if_declined' => ':Other rad etilgan bo‘lsa, :attribute maydonidan foydalanish taqiqlangan.',
    'prohibited_unless'      => ':Other :values ichida bo‘lmasa, :attribute maydonidan foydalanish taqiqlangan.',
    'prohibits'              => ':Attribute maydoni :other maydonining mavjud bo‘lishini taqiqlaydi.',
    'regex'                  => ':Attribute maydonining formati noto‘g‘ri.',
    'required'               => ':Attribute maydoni majburiy.',
    'required_array_keys'    => ':Attribute maydoni quyidagi kalitlarga ega bo‘lishi kerak: :values.',
    'required_if'            => ':Other :value bo‘lsa, :attribute maydoni majburiy.',
    'required_if_accepted'   => ':Other qabul qilingan bo‘lsa, :attribute maydoni majburiy.',
    'required_if_declined'   => ':Other rad etilgan bo‘lsa, :attribute maydoni majburiy.',
    'required_unless'        => ':Other :values ichida bo‘lmasa, :attribute maydoni majburiy.',
    'required_with'          => ':Values mavjud bo‘lsa, :attribute maydoni majburiy.',
    'required_with_all'      => ':Values mavjud bo‘lsa, :attribute maydoni majburiy.',
    'required_without'       => ':Values mavjud bo‘lmasa, :attribute maydoni majburiy.',
    'required_without_all'   => ':Values ning hech biri mavjud bo‘lmasa, :attribute maydoni majburiy.',
    'same'                   => ':Attribute maydoni :other bilan bir xil bo‘lishi kerak.',
    'size'                   => [
        'array'   => ':Attribute maydoni :size elementdan iborat bo‘lishi kerak.',
        'file'    => ':Attribute maydoni :size kilobayt bo‘lishi kerak.',
        'numeric' => ':Attribute maydoni :size bo‘lishi kerak.',
        'string'  => ':Attribute maydoni :size belgidan iborat bo‘lishi kerak.',
    ],
    'starts_with'            => ':Attribute maydoni quyidagilardan biri bilan boshlanishi kerak: :values.',
    'string'                 => ':Attribute maydoni satr bo‘lishi kerak.',
    'timezone'               => ':Attribute maydoni yaroqli vaqt zonasi bo‘lishi kerak.',
    'unique'                 => ':Attribute allaqachon olingan.',
    'uploaded'               => ':Attribute yuklash muvaffaqiyatsiz tugadi.',
    'uppercase'              => ':Attribute maydoni katta harflarda bo‘lishi kerak.',
    'url'                    => ':Attribute maydoni yaroqli URL bo‘lishi kerak.',
    'ulid'                   => ':Attribute maydoni yaroqli ULID bo‘lishi kerak.',
    'uuid'                   => ':Attribute maydoni yaroqli UUID bo‘lishi kerak.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'                 => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes'             => [],

];
