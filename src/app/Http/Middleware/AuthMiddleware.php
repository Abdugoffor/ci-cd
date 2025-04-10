<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            
            $lang = $request->segment(1);

            $langs = getLanguage()->pluck('slug')->toArray();

            if (!$lang || !in_array($lang, $langs)) {

                $lang = Session::get('lang', $langs[0] ?? 'en');
            }

            return redirect()->route('login', ['lang' => $lang]);
        }

        return $next($request);
    }
}
