<?php

namespace Database\Seeders;

use App\Models\listings as ModelsListings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class listings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsListings::factory(10)->create();
    }
}
