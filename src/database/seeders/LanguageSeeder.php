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

            ['name' => 'English', 'slug' => 'en', 'is_active' => false],
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

        ]);
    }
}
