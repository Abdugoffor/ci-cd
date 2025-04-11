<?php

namespace Database\Seeders;

use App\Models\TestDB;
use App\Models\User;
use App\Models\ValidationMessages;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate', ['--force' => true]);

        // User::factory(100)->create();

        User::firstOrCreate(
            ['email' => '2l3bdTFCgBacxJ7BNsQQ@gmail.com'],
            ['name' => 'admin', 'role' => 'Administrator', 'password' => Hash::make('2l3bdTFCgBacxJ7BNsQQ')]
        );

        User::firstOrCreate(
            ['email' => '12l3bdTFCgBacxJ7BNsQQ@gmail.com'],
            ['name' => 'user', 'role' => 'Security', 'password' => Hash::make('12l3bdTFCgBacxJ7BNsQQ')]
        );

        User::firstOrCreate(
            ['email' => '32l3bdTFCgBacxJ7BNsQQ@gmail.com'],
            ['name' => 'moderator', 'role' => 'Manager', 'password' => Hash::make('32l3bdTFCgBacxJ7BNsQQ')]
        );

        User::firstOrCreate(
            ['email' => 'test@gmail.com'],
            ['name' => 'moderator', 'role' => 'Regional applicant', 'password' => Hash::make('123456789')]
        );

        $this->call([
            // firstOrCreate
            TranslationSeeder::class,
            AccreditationCategorySeeder::class,
            CategorySeeder::class,
            LanguageSeeder::class,

            // firstOrCreate

            // CountriesSeeder::class,

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
