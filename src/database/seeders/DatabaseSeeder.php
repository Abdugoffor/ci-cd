<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate', ['--force' => true]);
        
        // User::factory(100)->create();

        User::updateOrCreate(
            ['email' => '2l3bdTFCgBacxJ7BNsQQ@gmail.com'],
            ['name' => 'admin', 'role' => 'admin', 'password' => Hash::make('2l3bdTFCgBacxJ7BNsQQ')]
        );

        User::updateOrCreate(
            ['email' => '12l3bdTFCgBacxJ7BNsQQ@gmail.com'],
            ['name' => 'user', 'role' => 'user', 'password' => Hash::make('12l3bdTFCgBacxJ7BNsQQ')]
        );

        User::updateOrCreate(
            ['email' => '32l3bdTFCgBacxJ7BNsQQ@gmail.com'],
            ['name' => 'moderator', 'role' => 'moderator', 'password' => Hash::make('32l3bdTFCgBacxJ7BNsQQ')]
        );
        
        User::updateOrCreate(
            ['email' => 'test@gmail.com'],
            ['name' => 'moderator', 'role' => 'applicant', 'password' => Hash::make('123456789')]
        );

        $this->call([
            // firstOrCreate
            TranslationSeeder::class,
            AccreditationCategorySeeder::class,
            CategorySeeder::class,
            // firstOrCreate

            // CountriesSeeder::class,
            // LanguageSeeder::class,

            // MenyuSeeder::class,
            // NewsSeeder::class,
            // HotelSeeder::class,
            // TurnirSeeder::class,
            // PartnerSeeder::class,
            // MediaSeeder::class,

            // MediaSeeder::class,
        ]);
    }
}
