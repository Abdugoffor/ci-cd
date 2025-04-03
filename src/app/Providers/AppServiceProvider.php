<?php
namespace App\Providers;

use App\Models\Media;
use App\Models\Menyu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Facades\Excel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::alias('Excel', Excel::class);
    }

    
    public function boot(): void
    {
        // HTTPS majburiy qilish
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }

        // Barcha sahifalarda `siteSettings` va `languages` mavjud bo'lishi
        View::composer('*', function ($view) {
            $view->with([
                'languages'    => getLanguage(),
                'siteSettings' => cache()->remember('site_settings', 60 * 60, function () {
                    return Media::where('is_active', true)->orderByDesc('id')->first();
                }),
            ]);
        });

        // Admin panel uchun alohida `View::composer`
        View::composer('layouts.admin', function ($view) {
            $view->with('languages', getLanguage());
        });

        // Faqat `client` sahifalarida `menus` qo'shish
        View::composer(['layouts.client', 'client.index'], function ($view) {
            $view->with('menus', cache()->remember('menus', 60 * 60, function () {
                return Menyu::where('is_active', true)->orderByDesc('id')->limit(5)->get();
            }));
        });

        // Bootstrap uchun pagination
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
