<?php

namespace Database\Seeders;

use App\Models\Ville;
use Database\Factories\VilleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([VilleSeeder::class]);
        $this->call([UserSeeder::class]);
    }
}
