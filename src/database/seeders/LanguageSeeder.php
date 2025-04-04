<?php
namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $languages = [
            ['name' => 'English', 'slug' => 'en', 'is_active' => true],
            ['name' => 'Русский', 'slug' => 'ru', 'is_active' => true],
            ['name' => 'O‘zbekcha', 'slug' => 'uz', 'is_active' => true],

            ['name' => 'Français', 'slug' => 'fr', 'is_active' => false],
            ['name' => 'Deutsch', 'slug' => 'de', 'is_active' => false],
            ['name' => 'Español', 'slug' => 'es', 'is_active' => false],
            ['name' => 'Italiano', 'slug' => 'it', 'is_active' => false],
            ['name' => 'Türkçe', 'slug' => 'tr', 'is_active' => false],
            ['name' => 'Қазақша', 'slug' => 'kk', 'is_active' => false],
            ['name' => 'Қарақалпақша', 'slug' => 'kaa', 'is_active' => false],
            ['name' => '中文', 'slug' => 'zh', 'is_active' => false],
            ['name' => '日本語', 'slug' => 'ja', 'is_active' => false],
            ['name' => '한국어', 'slug' => 'ko', 'is_active' => false],
            ['name' => 'العربية', 'slug' => 'ar', 'is_active' => false],
            ['name' => 'فارسی', 'slug' => 'fa', 'is_active' => false],
            ['name' => 'Português', 'slug' => 'pt', 'is_active' => false],
            ['name' => 'Հայերեն', 'slug' => 'hy', 'is_active' => false],
            ['name' => 'हिन्दी', 'slug' => 'hi', 'is_active' => false],
            ['name' => 'Azərbaycan', 'slug' => 'az', 'is_active' => false],
            ['name' => 'Монгол', 'slug' => 'mn', 'is_active' => false],

            // New language

            // ['name' => 'Afrikaans', 'slug' => 'af', 'is_active' => false],
            // ['name' => 'বাংলা', 'slug' => 'bn', 'is_active' => false], // Bengali
            // ['name' => 'Català', 'slug' => 'ca', 'is_active' => false],
            // ['name' => 'Čeština', 'slug' => 'cs', 'is_active' => false], // Czech
            // ['name' => 'Dansk', 'slug' => 'da', 'is_active' => false],     // Danish
            // ['name' => 'Eesti', 'slug' => 'et', 'is_active' => false],     // Estonian
            // ['name' => 'Filipino', 'slug' => 'tl', 'is_active' => false],
            // ['name' => 'Suomi', 'slug' => 'fi', 'is_active' => false], // Finnish
            // ['name' => 'Galego', 'slug' => 'gl', 'is_active' => false],
            // ['name' => 'Ελληνικά', 'slug' => 'el', 'is_active' => false], // Greek
            // ['name' => 'עברית', 'slug' => 'he', 'is_active' => false],       // Hebrew
            // ['name' => 'Hrvatski', 'slug' => 'hr', 'is_active' => false],         // Croatian
            // ['name' => 'Kreyòl Ayisyen', 'slug' => 'ht', 'is_active' => false],  // Haitian Creole
            // ['name' => 'Magyar', 'slug' => 'hu', 'is_active' => false],           // Hungarian
            // ['name' => 'Íslenska', 'slug' => 'is', 'is_active' => false],        // Icelandic
            // ['name' => 'Bahasa Indonesia', 'slug' => 'id', 'is_active' => false],
            // ['name' => 'Gaeilge', 'slug' => 'ga', 'is_active' => false],               // Irish
            // ['name' => 'ქართული', 'slug' => 'ka', 'is_active' => false], // Georgian
            // ['name' => 'Kurdî', 'slug' => 'ku', 'is_active' => false],                // Kurdish
            // ['name' => 'Latviešu', 'slug' => 'lv', 'is_active' => false],             // Latvian
            // ['name' => 'Lietuvių', 'slug' => 'lt', 'is_active' => false],             // Lithuanian
            // ['name' => 'Македонски', 'slug' => 'mk', 'is_active' => false],  // Macedonian
            // ['name' => 'Bahasa Melayu', 'slug' => 'ms', 'is_active' => false],         // Malay
            // ['name' => 'Malti', 'slug' => 'mt', 'is_active' => false],                 // Maltese
            // ['name' => 'Nederlands', 'slug' => 'nl', 'is_active' => false],            // Dutch
            // ['name' => 'Norsk', 'slug' => 'no', 'is_active' => false],                 // Norwegian
            // ['name' => 'ਪੰਜਾਬੀ', 'slug' => 'pa', 'is_active' => false],    // Punjabi
            // ['name' => 'Polski', 'slug' => 'pl', 'is_active' => false],                // Polish
            // ['name' => 'Română', 'slug' => 'ro', 'is_active' => false],              // Romanian
            // ['name' => 'Slovenčina', 'slug' => 'sk', 'is_active' => false],           // Slovak
            // ['name' => 'Slovenščina', 'slug' => 'sl', 'is_active' => false],         // Slovenian
            // ['name' => 'Српски', 'slug' => 'sr', 'is_active' => false],          // Serbian
            // ['name' => 'Svenska', 'slug' => 'sv', 'is_active' => false],               // Swedish
            // ['name' => 'Kiswahili', 'slug' => 'sw', 'is_active' => false],             // Swahili
            // ['name' => 'தமிழ்', 'slug' => 'ta', 'is_active' => false],       // Tamil
            // ['name' => 'తెలుగు', 'slug' => 'te', 'is_active' => false],    // Telugu
            // ['name' => 'ไทย', 'slug' => 'th', 'is_active' => false],             // Thai
            // ['name' => 'Tagalog', 'slug' => 'tl', 'is_active' => false],
            // ['name' => 'Українська', 'slug' => 'uk', 'is_active' => false], // Ukrainian
            // ['name' => 'اردو', 'slug' => 'ur', 'is_active' => false],             // Urdu
            // ['name' => 'Tiếng Việt', 'slug' => 'vi', 'is_active' => false],       // Vietnamese
            // ['name' => 'Cymraeg', 'slug' => 'cy', 'is_active' => false],              // Welsh
            // ['name' => 'ייִדיש', 'slug' => 'yi', 'is_active' => false],         // Yiddish
            // ['name' => 'Yorùbá', 'slug' => 'yo', 'is_active' => false],
            // ['name' => 'Zulu', 'slug' => 'zu', 'is_active' => false],
            // ['name' => 'አማርኛ', 'slug' => 'am', 'is_active' => false],                                                   // Amharic
            // ['name' => 'বিষ্ণুপ্রিয়া মণিপুরী', 'slug' => 'bpy', 'is_active' => false], // Bishnupriya Manipuri
            // ['name' => 'Chichewa', 'slug' => 'ny', 'is_active' => false],
            // ['name' => 'Fiji Hindi', 'slug' => 'hif', 'is_active' => false],
            // ['name' => 'Gàidhlig', 'slug' => 'gd', 'is_active' => false],             // Scottish Gaelic
            // ['name' => 'ગુજરાતી', 'slug' => 'gu', 'is_active' => false], // Gujarati
            // ['name' => 'Hausa', 'slug' => 'ha', 'is_active' => false],
            // ['name' => 'Igbo', 'slug' => 'ig', 'is_active' => false],
            // ['name' => 'Iñupiaq', 'slug' => 'ik', 'is_active' => false],
            // ['name' => 'Jawa', 'slug' => 'jv', 'is_active' => false],             // Javanese
            // ['name' => 'ಕನ್ನಡ', 'slug' => 'kn', 'is_active' => false],  // Kannada
            // ['name' => 'Кыргызча', 'slug' => 'ky', 'is_active' => false], // Kyrgyz
            // ['name' => 'Luganda', 'slug' => 'lg', 'is_active' => false],
            // ['name' => 'മലയാളം', 'slug' => 'ml', 'is_active' => false], // Malayalam
            // ['name' => 'मराठी', 'slug' => 'mr', 'is_active' => false],    // Marathi
            // ['name' => 'नेपाली', 'slug' => 'ne', 'is_active' => false], // Nepali
            // ['name' => 'Occitan', 'slug' => 'oc', 'is_active' => false],
            // ['name' => 'ଓଡ଼ିଆ', 'slug' => 'or', 'is_active' => false],             // Odia
            // ['name' => 'ਪੰਜਾਬੀ', 'slug' => 'pa', 'is_active' => false],          // Punjabi
            // ['name' => 'Runa Simi', 'slug' => 'qu', 'is_active' => false],                   // Quechua
            // ['name' => 'संस्कृतम्', 'slug' => 'sa', 'is_active' => false], // Sanskrit
            // ['name' => 'සිංහල', 'slug' => 'si', 'is_active' => false],             // Sinhala
            // ['name' => 'Somali', 'slug' => 'so', 'is_active' => false],
            // ['name' => 'Basa Sunda', 'slug' => 'su', 'is_active' => false],             // Sundanese
            // ['name' => 'Тоҷикӣ', 'slug' => 'tg', 'is_active' => false],           // Tajik
            // ['name' => 'Түркмәнче', 'slug' => 'tk', 'is_active' => false],     // Turkmen
            // ['name' => 'Татарча', 'slug' => 'tt', 'is_active' => false],         // Tatar
            // ['name' => 'ئۇيغۇرچە', 'slug' => 'ug', 'is_active' => false],       // Uyghur
            // ['name' => 'Oʻzbekcha (Arab)', 'slug' => 'uz_arab', 'is_active' => false], // Uzbek Arabic script
            // ['name' => 'Wolof', 'slug' => 'wo', 'is_active' => false],
            // ['name' => 'Xhosa', 'slug' => 'xh', 'is_active' => false],
            // ['name' => 'Yorùbá', 'slug' => 'yo', 'is_active' => false],
            // ['name' => 'Zulu', 'slug' => 'zu', 'is_active' => false],
            // ['name' => 'Bamanankan', 'slug' => 'bm', 'is_active' => false], // Bambara
            // ['name' => 'Eʋegbe', 'slug' => 'ee', 'is_active' => false],    // Ewe
            // ['name' => 'Fulfulde', 'slug' => 'ff', 'is_active' => false],
            // ['name' => 'Gĩkũyũ', 'slug' => 'ki', 'is_active' => false], // Kikuyu
            // ['name' => 'Kinyarwanda', 'slug' => 'rw', 'is_active' => false],
            // ['name' => 'Kirundi', 'slug' => 'rn', 'is_active' => false],
            // ['name' => 'Lingála', 'slug' => 'ln', 'is_active' => false], // Lingala
            // ['name' => 'Luganda', 'slug' => 'lg', 'is_active' => false],
            // ['name' => 'Malagasy', 'slug' => 'mg', 'is_active' => false],
            // ['name' => 'Oromoo', 'slug' => 'om', 'is_active' => false], // Oromo
            // ['name' => 'Sesotho', 'slug' => 'st', 'is_active' => false],
            // ['name' => 'Shona', 'slug' => 'sn', 'is_active' => false],
            // ['name' => 'SiSwati', 'slug' => 'ss', 'is_active' => false], // Swati
            // ['name' => 'Tigrinya', 'slug' => 'ti', 'is_active' => false],
            // ['name' => 'Wolof', 'slug' => 'wo', 'is_active' => false],
            // ['name' => 'isiXhosa', 'slug' => 'xh', 'is_active' => false],
            // ['name' => 'isiZulu', 'slug' => 'zu', 'is_active' => false],
        ];

        foreach ($languages as $language) {
            Language::firstOrCreate(
                ['slug' => $language['slug']],
                $language
            );
        }
    }
}
