<?php

use Illuminate\Support\Facades\Route;
// website controller
use App\Http\Controllers\website\{MainController, ProductController};
// Dashboard controller
use App\Http\Controllers\dashboard\{DashboardMainController,CategoryController,SubCategoryController,UserController, ProductController as DashProdContr};
// Auth controller
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Define website routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
],
 function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/contactUs', [MainController::class, 'contactUs'])->name('contactUs');
    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
});

// Define dashboard routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'dashboard'],
], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardMainController::class, 'index'])->name('dashboard');

        // UserRoutes
        Route::resource('users', UserController::class);
        Route::get('/user/customers', [UserController::class, 'customersIndex'])->name('users.customers');
        Route::get('/user/moderators', [UserController::class, 'moderatorsIndex'])->name('users.moderators');
        Route::get('/user/admins', [UserController::class, 'adminsIndex'])->name('users.admins');

        Route::resource('/categories', CategoryController::class);
        Route::get('/category/delete',[CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}',[CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forecDelete/{id}',[CategoryController::class, 'forceDelete'])->name('categories.forceDelete');

       Route::resource('subcategories', SubCategoryController::class);
       Route::get('/subcategory/trash',[SubCategoryController::class, 'trash'])->name('subcategories.trash');
       Route::get('/subcategory/restore/{id}', [SubCategoryController::class, 'restore'])->name('subcategories.restore');
       Route::delete('/subcategory/forceDelete/{id}', [SubCategoryController::class,'forceDelete'])->name('subcategories.forceDelete');

       //  routing Products
       Route::resource('/products', DashProdContr::class);
       Route::get('/product/delete',[DashProdContr::class, 'delete'])->name('products.delete');
       Route::get('/product/restore/{id}', [DashProdContr::class, 'restore'])->name('products.restore');
       Route::delete('/product/forceDelete/{id}', [DashProdContr::class,'forceDelete'])->name('products.forceDelete');
    });

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_auth');


// Route for switching languages
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');
