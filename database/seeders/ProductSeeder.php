<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\SubCategory;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $subCategories = SubCategory::all();

        if ($subCategories->isEmpty()) {
            // Handle case where no subcategories exist
            // You might want to create some default subcategories here
            echo "No subcategories found. Please create some subcategories first.\n";
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'title' => $faker->sentence(3),
                'image' => 'cloth_' . $faker->numberBetween(1, 3) . '.jpg', // Assuming cloth_1.jpg, cloth_2.jpg, cloth_3.jpg exist
                'description' => $faker->paragraph(3),
                'price' => $faker->randomFloat(2, 10, 500),
                'available_quantity' => $faker->numberBetween(1, 100),
                'size' => $faker->randomElement(['Small', 'Medium', 'Large', 'X-Large']),
                'color' => $faker->randomElement(['Red', 'Green', 'Blue', 'Black', 'White']),
                'sub_category_id' => $faker->randomElement($subCategories->pluck('id')->toArray()),
                'create_user_id' => null, // Assuming nullable or handle user creation if needed
                'update_user_id' => null, // Assuming nullable or handle user creation if needed
            ]);
        }
    }
}
