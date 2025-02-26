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
        Language::insert([
            // ['name' => 'O‘zbekcha', 'slug' => 'uz', 'is_active' => true],
            // ['name' => 'Русский', 'slug' => 'ru', 'is_active' => true],
            // ['name' => 'English', 'slug' => 'en', 'is_active' => true],

            ['name' => 'O‘zbekcha', 'slug' => 'uz', 'is_active' => true],
            ['name' => 'Русский', 'slug' => 'ru', 'is_active' => true],
            ['name' => 'English', 'slug' => 'en', 'is_active' => true],
            ['name' => 'Français', 'slug' => 'fr', 'is_active' => true],
            ['name' => 'Deutsch', 'slug' => 'de', 'is_active' => true],
            ['name' => 'Español', 'slug' => 'es', 'is_active' => true],
            ['name' => 'Italiano', 'slug' => 'it', 'is_active' => true],
            ['name' => 'Türkçe', 'slug' => 'tr', 'is_active' => true],
            ['name' => 'Қазақша', 'slug' => 'kk', 'is_active' => true],
            ['name' => 'Қарақалпақша', 'slug' => 'kaa', 'is_active' => true],
            ['name' => '中文', 'slug' => 'zh', 'is_active' => true],
            ['name' => '日本語', 'slug' => 'ja', 'is_active' => true],
            ['name' => '한국어', 'slug' => 'ko', 'is_active' => true],
            ['name' => 'العربية', 'slug' => 'ar', 'is_active' => true],
            ['name' => 'فارسی', 'slug' => 'fa', 'is_active' => true],
            ['name' => 'Português', 'slug' => 'pt', 'is_active' => true],
            ['name' => 'Հայերեն', 'slug' => 'hy', 'is_active' => true],
            ['name' => 'हिन्दी', 'slug' => 'hi', 'is_active' => true],
            ['name' => 'Azərbaycan', 'slug' => 'az', 'is_active' => true],
            ['name' => 'Монгол', 'slug' => 'mn', 'is_active' => true],

        ]);
    }
}
