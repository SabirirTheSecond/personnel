<?php

namespace Database\Seeders;

use App\Models\ChefSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChefSection::factory(5)->create();
    }
}
