<?php



namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\website\CartController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $locale = session()->get('locale', config('app.locale'));
        app()->setLocale($locale);

        // Share cart item count with the navbar view
        View::composer('website.includes.navbar', function ($view) {
            $cartItemCount = CartController::getCartItemCount();
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}

