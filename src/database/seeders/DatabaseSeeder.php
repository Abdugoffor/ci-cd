<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'admin', 'role' => 'admin', 'password' => Hash::make('12345678')]
        );

        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            ['name' => 'user', 'role' => 'user', 'password' => Hash::make('12345678')]
        );

        User::updateOrCreate(
            ['email' => 'moderator@gmail.com'],
            ['name' => 'moderator', 'role' => 'moderator', 'password' => Hash::make('12345678')]
        );

        $this->call([
            TranslationSeeder::class,
            CountriesSeeder::class,
            LanguageSeeder::class,
            AccreditationCategorySeeder::class,
            CategorySeeder::class,
            // MenyuSeeder::class,
            // NewsSeeder::class,
            // HotelSeeder::class,
            // TurnirSeeder::class,
            // PartnerSeeder::class,
            // MediaSeeder::class,
        ]);
    }
}
