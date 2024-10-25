<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::create([
            'title' => 'category_1',
        ]);

        $category = Category::create([
            'title' => 'category_2',
        ]);

        $category = Category::create([
            'title' => 'category_3',
        ]);

        $category = Category::create([
            'title' => 'category_4',
        ]);

        $category = Category::create([
            'title' => 'category_5',
        ]);

        $category = Category::create([
            'title' => 'category_6',
        ]);
    }
}
