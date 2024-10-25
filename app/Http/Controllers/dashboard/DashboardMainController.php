<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;

class DashboardMainController extends Controller
{
    //
    public function index() {
        $adminCount = User::where('user_type', 'admin')->count();
        $moderatorCount = User::where('user_type', 'moderator')->count();
        $customerCount = User::where('user_type', 'customer')->count();
        $categoryCount = Category::count(); 
        $subCategoryCount = SubCategory::count(); 
        $productCount = Product::count(); 
        
        return view('dashboard.pages.home', compact('adminCount', 'moderatorCount', 'customerCount','categoryCount', 'subCategoryCount', 'productCount'));
    }
}
