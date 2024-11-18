<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
            'color' => 'yellow',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'color' => 'red',
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'color' => 'green',
        ]);

        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
            'color' => 'blue',
        ]);

        Category::create([
            'name' => 'Politik',
            'slug' => 'politik',
            'color' => 'gray',
        ]);

        Category::create([
            'name' => 'Sains',
            'slug' => 'sains',
            'color' => 'indigo',
        ]);
    }
}
