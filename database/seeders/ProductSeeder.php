<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::create([
            'title'           => 'Blue T-shirt',
            'image'           => 'cloth_3.jpg',
            'price'           => 100.5,
            'sub_category_id' => 1,
        ]);

        $product = Product::create([
            'title'           => 'Shoe',
            'image'           => 'shoe_1.jpg',
            'price'           => 210.5,
            'sub_category_id' => 3,
        ]);

        $product = Product::create([
            'title'           => 'White Blouse',
            'image'           => 'cloth_1.jpg',
            'price'           => 150,
            'sub_category_id' => 4,
        ]);

        $product = Product::create([
            'title'           => 'Suit',
            'image'           => 'cloth_2.jpg',
            'price'           => 450,
            'sub_category_id' => 3,
        ]);

        $product = Product::create([
            'title'           => 'Stock CLothes',
            'image'           => 'cloth_3.jpg',
            'price'           => 200,
            'sub_category_id' => 5,
        ]);
    }
}
