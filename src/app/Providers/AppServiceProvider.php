<?php
namespace App\Providers;

use App\Models\Menyu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }

        View::composer('layouts.admin', function ($view) {
            $view->with('languages', getLanguage());
        });

        View::composer('layouts.client', function ($view) {
            $menus     = Menyu::where('is_active', true)->orderByDesc('id')->limit(5)->get();

            $view->with('menus', $menus);
        });
        View::composer('layouts.client', function ($view) {

            $languages = getLanguage();
            $view->with('languages', $languages);
        });

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
