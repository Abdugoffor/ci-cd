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
        // if (config('app.env') !== 'local') {
        //     URL::forceScheme('https');
        // }

        // View::composer('*', function ($view) {
        //     $view->with([
        //         'languages'    => getLanguage(),
        //         'siteSettings' => cache()->remember('site_settings', 60 * 60, function () {
        //             return Media::where('is_active', true)->orderByDesc('id')->first();
        //         }),
        //     ]);
        // });

        // View::composer('layouts.admin', function ($view) {
        //     $view->with('languages', getLanguage());
        // });

        // View::composer(['layouts.client', 'client.index'], function ($view) {
        //     $view->with('menus', cache()->remember('menus', 60 * 60, function () {
        //         return Menyu::where('is_active', true)->orderByDesc('id')->limit(5)->get();
        //     }));
        // });

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
        View::composer('client.test', function ($view) {

            $siteSettings = Media::where('is_active', true)->orderByDesc('id')->first();

            $view->with([
                'siteSettings' => $siteSettings,
            ]);
        });

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
