<?php

namespace Database\Seeders;

use App\Models\News;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([CategorySeeder::class, UserSeeder::class]);
        News::factory(20)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
