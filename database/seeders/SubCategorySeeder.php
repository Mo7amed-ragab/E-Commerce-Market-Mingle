<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategory = SubCategory::create([
            'title' => 'winter',
            'category_id' => 2,
            'create_user_id' => 1
        ]);

        $subCategory = SubCategory::create([
            'title' => 'summer',
            'category_id' => 3,
        ]);

        $subCategory = SubCategory::create([
            'title' => 'autumn',
            'category_id' => 1,
        ]);

        $subCategory = SubCategory::create([
            'title' => 'anything',
            'category_id' => 5,
        ]);

        $subCategory = SubCategory::create([
            'title' => 'nothing',
            'category_id' => 2,
        ]);

        $subCategory = SubCategory::create([
            'title' => 'everyone',
            'category_id' => 3,
        ]);
    }
}
