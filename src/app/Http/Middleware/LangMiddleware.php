<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = ['uz', 'ru', 'en'];

        $locale = Session::get('locale', 'en');

        if (! in_array($locale, $availableLocales)) {
            $locale = 'uz';
            Session::put('locale', $locale);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
