<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        // Path Traversal tekshiruvi
        if ($request->has('_token') && strpos($request->input('_token'), '../') !== false) {
            abort(403, 'Unauthorized action.');
        }

        $response = $next($request);

        // Nonce generatsiyasi
        $nonce = base64_encode(Str::random(16));

        // CSP sozlamasi
        $csp = "default-src 'self'; " .
            "script-src 'self' 'nonce-{$nonce}' https://cdn.jsdelivr.net https://www.google.com https://www.gstatic.com https://www.recaptcha.net https://cdnjs.cloudflare.com; " .
            "style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com https://cdnjs.cloudflare.com; " .
            "font-src 'self' https://fonts.gstatic.com; " .
            "img-src 'self' data: https://cdn.jsdelivr.net https://www.google.com https://www.recaptcha.net; " .
            "frame-src https://www.google.com https://www.recaptcha.net; " .
            "connect-src 'self' https://www.google.com https://www.recaptcha.net; " .
            "base-uri 'self'; " .
            "form-action 'self';";

        // Sarlavhalar
        $response->header('Content-Security-Policy', $csp);
        $response->header('X-Frame-Options', 'DENY', false);
        $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload', false);
        $response->header('X-Content-Type-Options', 'nosniff', false);

        // Nonce’ni Blade uchun request’ga qo‘shish
        $request->attributes->set('csp_nonce', $nonce);

        return $response;
    }
}
