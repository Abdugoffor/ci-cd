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
        $defaultLocale = Session::get('lang');

        // Agar sessiyada til yo'q bo'lsa, birinchi faol tilni olish
        if (!$defaultLocale) {
            $defaultLocale = Language::where('is_active', true)->first()->slug ?? 'en';
            Session::put('lang', $defaultLocale);
        }

        $availableLocales = Language::where('is_active', true)->pluck('slug')->toArray();
        $locale = $request->query('lang');

        if ($locale) {
            // Agar URL'da lang parametri mavjud bo'lsa va u to'g'ri bo'lsa
            if (in_array($locale, $availableLocales)) {
                Session::put('lang', $locale);
            } else {
                $locale = $defaultLocale; // Noto'g'ri til bo'lsa default tilga o'tish
            }
        } else {
            // Agar URL'da lang yo'q bo'lsa, sessiyadan olish
            $locale = Session::get('lang', $defaultLocale);
            if (!in_array($locale, $availableLocales)) {
                $locale = $defaultLocale;
            }

            // Redirect faqat birinchi kirishda va URL'da lang yo'q bo'lganda
            if (!$request->has('lang') && $request->method() === 'GET' && !$request->routeIs('change.language')) {
                $fullUrl = $request->fullUrl();
                // Agar URL'da lang parametri allaqachon mavjud bo'lmasa
                if (!str_contains($fullUrl, 'lang=')) {
                    $existingQuery = $request->except('lang');
                    $queryString = http_build_query(array_merge($existingQuery, ['lang' => $locale]));
                    $newUrl = $request->url() . ($queryString ? '?' . $queryString : '');
                    // Log qo'shish (ixtiyoriy, debug uchun)
                    // Log::info('Redirecting to: ' . $newUrl);
                    return redirect()->to($newUrl);
                }
            }
        }

        App::setLocale($locale);

        return $next($request);

        // $locale = Session::get('lang');

        // if (! $locale) {
        //     $locale = getLanguage()->first()->slug;

        //     Session::put('lang', $locale);
        // }

        // App::setLocale($locale);

        // return $next($request);
    }
}
