<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\SubCategory;
use App\Models\Product;

class MainController extends Controller
{

    // Home Page 
    public function home()
    {
        $menSubCategory = SubCategory::where('title', 'Men')->first();
        $womenSubCategory = SubCategory::where('title', 'Women')->first();
        $childrenSubCategory = SubCategory::where('title', 'Children')->first();

        $featuredProducts = Product::with('subCategory')->latest()->take(4)->get();

        return view('website.pages.home', compact('menSubCategory', 'womenSubCategory', 'childrenSubCategory', 'featuredProducts'));
    }
    // about Page
    public function about()
    {
        $page = Page::where('slug', 'about-us')->first();

        if (!$page) {
            // If the 'about-us' page doesn't exist, create a default one
            $page = Page::create([
                'title' => 'About Us',
                'slug' => 'about-us',
                'content' => 'This is the default About Us page content. Please update it from the admin panel.'
            ]);
        }

        return view('website.pages.about', compact('page'));
    }

    // Contact us
    public function contactUs()
    {
        return view('website.pages.contactUs');
    }
}
