<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::create([
            'name' => 'Berita',
            'slug' => 'berita',
            'color' => 'red',
        ]);

        Category::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
            'color' => 'blue',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'color' => 'yellow',
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'color' => 'green',
        ]);
    }
}
