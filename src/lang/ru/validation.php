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

    'accepted'               => 'Поле :attribute должно быть принято.',
    'accepted_if'            => 'Поле :attribute должно быть принято, когда :other равно :value.',
    'active_url'             => 'Поле :attribute должно быть действительным URL-адресом.',
    'after'                  => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal'         => 'Поле :attribute должно быть датой после или равной :date.',
    'alpha'                  => 'Поле :attribute должно содержать только буквы.',
    'alpha_dash'             => 'Поле :attribute должно содержать только буквы, цифры, дефисы и подчеркивания.',
    'alpha_num'              => 'Поле :attribute должно содержать только буквы и цифры.',
    'array'                  => 'Поле :attribute должно быть массивом.',
    'ascii'                  => 'Поле :attribute должно содержать только однобайтовые буквенно-цифровые символы и знаки.',
    'before'                 => 'Поле :attribute должно быть датой до :date.',
    'before_or_equal'        => 'Поле :attribute должно быть датой до или равной :date.',

    'between'                => [
        'array'   => 'Поле :attribute должно содержать от :min до :max элементов.',
        'file'    => 'Размер файла в поле :attribute должен быть от :min до :max килобайт.',
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'string'  => 'Поле :attribute должно содержать от :min до :max символов.',
    ],
    'boolean'                => 'Поле :attribute должно быть истинным или ложным.',
    'can'                    => 'Поле :attribute содержит недопустимое значение.',
    'confirmed'              => 'Подтверждение поля :attribute не совпадает.',
    'contains'               => 'Поле :attribute не содержит обязательное значение.',
    'current_password'       => 'Пароль неверен.',
    'date'                   => 'Поле :attribute должно быть действительной датой.',
    'date_equals'            => 'Поле :attribute должно быть датой, равной :date.',
    'date_format'            => 'Поле :attribute должно соответствовать формату :format.',
    'decimal'                => 'Поле :attribute должно содержать :decimal знаков после запятой.',
    'declined'               => 'Поле :attribute должно быть отклонено.',
    'declined_if'            => 'Поле :attribute должно быть отклонено, если :other равно :value.',
    'different'              => 'Поля :attribute и :other должны отличаться.',
    'digits'                 => 'Поле :attribute должно содержать :digits цифр.',
    'digits_between'         => 'Поле :attribute должно содержать от :min до :max цифр.',
    'dimensions'             => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct'               => 'Поле :attribute содержит повторяющееся значение.',
    'doesnt_end_with'        => 'Поле :attribute не должно заканчиваться на одно из следующих значений: :values.',
    'doesnt_start_with'      => 'Поле :attribute не должно начинаться с одного из следующих значений: :values.',
    'email'                  => 'Поле :attribute должно быть действительным адресом электронной почты.',
    'ends_with'              => 'Поле :attribute должно заканчиваться одним из следующих значений: :values.',
    'enum'                   => 'Выбранное значение для :attribute недопустимо.',
    'exists'                 => 'Выбранное значение для :attribute недопустимо.',
    'extensions'             => 'Поле :attribute должно иметь одно из следующих расширений: :values.',
    'file'                   => 'Поле :attribute должно быть файлом.',
    'filled'                 => 'Поле :attribute должно быть заполнено.',

    'gt'                     => [
        'array'   => 'Поле :attribute должно содержать более :value элементов.',
        'file'    => 'Поле :attribute должно быть больше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'string'  => 'Поле :attribute должно содержать больше :value символов.',
    ],
    'gte'                    => [
        'array'   => 'Поле :attribute должно содержать не менее :value элементов.',
        'file'    => 'Поле :attribute должно быть не меньше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть не меньше :value.',
        'string'  => 'Поле :attribute должно содержать не менее :value символов.',
    ],
    'hex_color'              => 'Поле :attribute должно быть допустимым шестнадцатеричным цветом.',
    'image'                  => 'Поле :attribute должно быть изображением.',
    'in'                     => 'Выбранное значение для :attribute недопустимо.',
    'in_array'               => 'Поле :attribute должно существовать в :other.',
    'integer'                => 'Поле :attribute должно быть целым числом.',
    'ip'                     => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4'                   => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6'                   => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json'                   => 'Поле :attribute должно быть допустимой строкой JSON.',
    'list'                   => 'Поле :attribute должно быть списком.',
    'lowercase'              => 'Поле :attribute должно содержать только строчные буквы.',
    'lt'                     => [
        'array'   => 'Поле :attribute должно содержать менее :value элементов.',
        'file'    => 'Поле :attribute должно быть меньше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'string'  => 'Поле :attribute должно содержать менее :value символов.',
    ],
    'lte'                    => [
        'array'   => 'Поле :attribute не должно содержать более :value элементов.',
        'file'    => 'Поле :attribute должно быть не больше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть не больше :value.',
        'string'  => 'Поле :attribute должно содержать не более :value символов.',
    ],
    'mac_address'            => 'Поле :attribute должно быть допустимым MAC-адресом.',
    'max'                    => [
        'array'   => 'Поле :attribute не должно содержать более :max элементов.',
        'file'    => 'Поле :attribute не должно быть больше :max килобайт.',
        'numeric' => 'Поле :attribute не должно быть больше :max.',
        'string'  => 'Поле :attribute не должно содержать более :max символов.',
    ],
    'max_digits'             => 'Поле :attribute не должно содержать более :max цифр.',
    'mimes'                  => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes'              => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',

    'min'                    => [
        'array'   => 'Поле :attribute должно содержать как минимум :min элементов.',
        'file'    => 'Поле :attribute должно быть не менее :min килобайт.',
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'string'  => 'Поле :attribute должно содержать не менее :min символов.',
    ],
    'min_digits'             => 'Поле :attribute должно содержать не менее :min цифр.',
    'missing'                => 'Поле :attribute должно отсутствовать.',
    'missing_if'             => 'Поле :attribute должно отсутствовать, если :other равно :value.',
    'missing_unless'         => 'Поле :attribute должно отсутствовать, если :other не равно :value.',
    'missing_with'           => 'Поле :attribute должно отсутствовать, если присутствует :values.',
    'missing_with_all'       => 'Поле :attribute должно отсутствовать, если присутствуют :values.',
    'multiple_of'            => 'Поле :attribute должно быть кратным :value.',
    'not_in'                 => 'Выбранное значение для :attribute недопустимо.',
    'not_regex'              => 'Формат поля :attribute недопустим.',
    'numeric'                => 'Поле :attribute должно быть числом.',
    'password'               => [
        'letters'       => 'Поле :attribute должно содержать хотя бы одну букву.',
        'mixed'         => 'Поле :attribute должно содержать хотя бы одну заглавную и одну строчную букву.',
        'numbers'       => 'Поле :attribute должно содержать хотя бы одну цифру.',
        'symbols'       => 'Поле :attribute должно содержать хотя бы один символ.',
        'uncompromised' => 'Указанный :attribute был найден в утечке данных. Пожалуйста, выберите другой :attribute.',
    ],
    'present'                => 'Поле :attribute должно присутствовать.',
    'present_if'             => 'Поле :attribute должно присутствовать, если :other равно :value.',
    'present_unless'         => 'Поле :attribute должно присутствовать, если :other не равно :value.',
    'present_with'           => 'Поле :attribute должно присутствовать, если присутствует :values.',
    'present_with_all'       => 'Поле :attribute должно присутствовать, если присутствуют :values.',
    'prohibited'             => 'Поле :attribute запрещено.',
    'prohibited_if'          => 'Поле :attribute запрещено, если :other равно :value.',
    'prohibited_if_accepted' => 'Поле :attribute запрещено, если :other принято.',
    'prohibited_if_declined' => 'Поле :attribute запрещено, если :other отклонено.',
    'prohibited_unless'      => 'Поле :attribute запрещено, если :other не входит в :values.',
    'prohibits'              => 'Поле :attribute запрещает присутствие :other.',
    'regex'                  => 'Формат поля :attribute недопустим.',
    'required'               => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys'    => 'Поле :attribute должно содержать записи для: :values.',
    'required_if'            => 'Поле :attribute обязательно, если :other равно :value.',
    'required_if_accepted'   => 'Поле :attribute обязательно, если :other принято.',
    'required_if_declined'   => 'Поле :attribute обязательно, если :other отклонено.',
    'required_unless'        => 'Поле :attribute обязательно, если :other не входит в :values.',
    'required_with'          => 'Поле :attribute обязательно, если присутствует :values.',
    'required_with_all'      => 'Поле :attribute обязательно, если присутствуют :values.',
    'required_without'       => 'Поле :attribute обязательно, если :values отсутствует.',
    'required_without_all'   => 'Поле :attribute обязательно, если отсутствуют все :values.',
    'same'                   => 'Поле :attribute должно совпадать с :other.',

    'size'                   => [
        'array'   => 'Поле :attribute должно содержать :size элементов.',
        'file'    => 'Поле :attribute должно быть размером :size килобайт.',
        'numeric' => 'Поле :attribute должно быть равно :size.',
        'string'  => 'Поле :attribute должно содержать :size символов.',
    ],

    'starts_with'            => 'Поле :attribute должно начинаться с одного из следующих значений: :values.',
    'string'                 => 'Поле :attribute должно быть строкой.',
    'timezone'               => 'Поле :attribute должно быть допустимым часовым поясом.',
    'unique'                 => 'Значение поля :attribute уже занято.',
    'uploaded'               => 'Не удалось загрузить :attribute.',
    'uppercase'              => 'Поле :attribute должно содержать только заглавные буквы.',
    'url'                    => 'Поле :attribute должно быть действительным URL-адресом.',
    'ulid'                   => 'Поле :attribute должно быть допустимым ULID.',
    'uuid'                   => 'Поле :attribute должно быть допустимым UUID.',

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
