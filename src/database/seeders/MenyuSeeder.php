<?php
namespace Database\Seeders;

use App\Models\Menyu;
use Illuminate\Database\Seeder;

class MenyuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menyu::create([
            "name" => [
                'uz'      => 'About',
                'ru'      => 'About',
                'en'      => 'About',
                'default' => 'About',
            ],
        ]);
        Menyu::create([
            "name" => [
                'uz'      => 'Yangliklar',
                'ru'      => 'Yangliklar',
                'en'      => 'Yangliklar',
                'default' => 'Yangliklar',
            ],
        ]);
    }
}
