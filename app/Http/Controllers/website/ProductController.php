<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    //Shop page
    public function shop()
    {
        $products = \App\Models\Product::get();
        return view('website.pages.products.shop', compact('products'));
    }
    // shopsingle page
    public function shopsingle()
    {
        return view('website.pages.products.shop-single');
    }
}
