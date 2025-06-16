<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create();
        Category::factory()->deleted()->create();
        Category::factory(5)->create();
        Category::factory()->state(['name' => 'Nombre personalizado'])->create();
    }
}
