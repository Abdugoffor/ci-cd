<?php
namespace App\Providers;

use App\Models\Media;
use App\Models\Menyu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
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

            $menus = Menyu::where('is_active', true)->orderByDesc('id')->limit(5)->get();

            $languages = getLanguage();

            $siteSettings = Media::where('is_active', true)->orderByDesc('id')->first();

            $view->with([
                'menus'        => $menus,
                'languages'    => $languages,
                'siteSettings' => $siteSettings,
            ]);
        });

        View::composer('client.index', function ($view) {

            $siteSettings = Media::where('is_active', true)->orderByDesc('id')->first();

            $view->with([
                'siteSettings' => $siteSettings,
            ]);
        });

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
