<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure parent categories exist or create them
        $menCategory = Category::firstOrCreate(['title' => 'Men']);
        $womenCategory = Category::firstOrCreate(['title' => 'Women']);
        $childrenCategory = Category::firstOrCreate(['title' => 'Children']);

        // Add or update SubCategories for Men, Women, Children
        SubCategory::firstOrCreate(
            ['title' => 'Men', 'category_id' => $menCategory->id],
            ['create_user_id' => 1]
        );
        SubCategory::firstOrCreate(
            ['title' => 'Women', 'category_id' => $womenCategory->id],
            ['create_user_id' => 1]
        );
        SubCategory::firstOrCreate(
            ['title' => 'Children', 'category_id' => $childrenCategory->id],
            ['create_user_id' => 1]
        );

        // You can keep or remove the existing dummy subcategories if you wish
        SubCategory::firstOrCreate(['title' => 'winter', 'category_id' => Category::firstOrCreate(['title' => 'Season Wear'])->id, 'create_user_id' => 1]);
        SubCategory::firstOrCreate(['title' => 'summer', 'category_id' => Category::firstOrCreate(['title' => 'Season Wear'])->id, 'create_user_id' => 1]);
        SubCategory::firstOrCreate(['title' => 'autumn', 'category_id' => Category::firstOrCreate(['title' => 'Season Wear'])->id, 'create_user_id' => 1]);
        SubCategory::firstOrCreate(['title' => 'anything', 'category_id' => Category::firstOrCreate(['title' => 'General'])->id, 'create_user_id' => 1]);
        SubCategory::firstOrCreate(['title' => 'nothing', 'category_id' => Category::firstOrCreate(['title' => 'General'])->id, 'create_user_id' => 1]);
        SubCategory::firstOrCreate(['title' => 'everyone', 'category_id' => Category::firstOrCreate(['title' => 'General'])->id, 'create_user_id' => 1]);

    }
}
