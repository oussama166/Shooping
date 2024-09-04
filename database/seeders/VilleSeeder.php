<?php

namespace Database\Seeders;

use App\Models\Ville;
use Database\Factories\VilleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ville::factory(100)->create();
    }
}
