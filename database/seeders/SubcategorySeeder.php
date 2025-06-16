<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::factory()->create();
        Subcategory::factory()->deleted()->create();
        Subcategory::factory()->state(['name' => 'Nombre personalizado'])->create();
    }
}
