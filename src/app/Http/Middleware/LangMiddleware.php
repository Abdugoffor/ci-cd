<?php

namespace App\Http\Middleware;

use App\Models\Language;
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
        // $defaultLocale = Session::get('lang');

        // if (!$defaultLocale) {
            
        //     $defaultLocale = Language::where('is_active', true)->first()->slug ?? 'en';
            
        //     Session::put('lang', $defaultLocale);
        // }

        // $availableLocales = Language::where('is_active', true)->pluck('slug')->toArray();
        
        // $locale = $request->query('lang');

        // if ($locale) {

        //     if (in_array($locale, $availableLocales)) {
        //         Session::put('lang', $locale);
        //     } else {
        //         $locale = $defaultLocale;
        //     }
        // } else {

        //     $locale = Session::get('lang', $defaultLocale);
            
        //     if (!in_array($locale, $availableLocales)) {
        //         $locale = $defaultLocale;
        //     }

        //     if (!$request->has('lang') && $request->method() === 'GET' && !$request->routeIs('change.language')) {

        //         $fullUrl = $request->fullUrl();

        //         if (!str_contains($fullUrl, 'lang=')) {

        //             $existingQuery = $request->except('lang');

        //             $queryString = http_build_query(array_merge($existingQuery, ['lang' => $locale]));

        //             $newUrl = $request->url() . ($queryString ? '?' . $queryString : '');
                    
        //             return redirect()->to($newUrl);
        //         }
        //     }
        // }

        // App::setLocale($locale);

        // return $next($request);

        $locale = Session::get('lang');

        if (! $locale) {
            $locale = getLanguage()->first()->slug;

            Session::put('lang', $locale);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
