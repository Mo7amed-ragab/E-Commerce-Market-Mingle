<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    //Shop page
    public function shop(Request $request)
    {
        $query = Product::query();

        // Filter by price
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Filter by sub_category_id
        if ($request->has('sub_category_id')) {
            $query->where('sub_category_id', $request->input('sub_category_id'));
        }

        // Filter by size
        if ($request->has('size') && is_array($request->input('size'))) {
            $query->whereIn('size', $request->input('size'));
        }

        // Filter by color
        if ($request->has('color') && is_array($request->input('color'))) {
            $query->whereIn('color', $request->input('color'));
        }

        $products = $query->paginate(6);
        $subCategories = SubCategory::withCount('products')->get();

        return view('website.pages.products.shop', compact('products', 'subCategories'));
    }
    // shopsingle page
    public function shopsingle($id)
    {
        $product = Product::with('subCategory')->findOrFail($id);
        return view('website.pages.products.shop-single', compact('product'));
    }
}
