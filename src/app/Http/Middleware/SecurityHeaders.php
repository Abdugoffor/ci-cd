<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        // if ($request->has('_token') && strpos($request->input('_token'), '../') !== false) {
        //     abort(403, 'Unauthorized action.');
        // }
        // // Nonce генерация (сразу в начале запроса!)
        // if (!$request->attributes->has('csp_nonce')) {
        //     $nonce = base64_encode(random_bytes(16));
        //     $request->attributes->set('csp_nonce', $nonce);
        // } else {
        //     $nonce = $request->attributes->get('csp_nonce');
        // }

        // $response = $next($request);

        // // После next() — когда response уже собран — достаём один и тот же nonce
        // $nonce = $request->attributes->get('csp_nonce');

        // $csp = "default-src 'self'; " .
        //     "script-src 'self' 'nonce-{$nonce}' https://www.google.com https://www.gstatic.com https://www.recaptcha.net; " .
        //     "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; " .
        //     "font-src 'self' data: https://fonts.gstatic.com; " .
        //     "img-src 'self' data: blob: file: https://www.google.com https://www.recaptcha.net; " .
        //     "frame-src https://www.google.com https://www.recaptcha.net; " .
        //     "connect-src 'self' data: blob: file: https://www.google.com https://www.recaptcha.net; " .
        //     "base-uri 'self'; " .
        //     "form-action 'self';";

        // $response->header('Content-Security-Policy', $csp);
        // $response->header('X-Frame-Options', 'DENY', false);
        // $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload', false);
        // $response->header('X-Content-Type-Options', 'nosniff', false);

        // return $response;

        
        // 1. CSRF token bilan xatolikni kamaytirish
        if ($request->has('_token') && strpos($request->input('_token'), '../') !== false) {
            abort(403, 'Unauthorized action.');
        }

        // 2. CSP nonce yaratish
        if (!$request->attributes->has('csp_nonce')) {
            $nonce = base64_encode(random_bytes(16));
            $request->attributes->set('csp_nonce', $nonce);
        } else {
            $nonce = $request->attributes->get('csp_nonce');
        }

        $response = $next($request);

        // 3. CSP sarlavhasini qo‘shish
        $nonce = $request->attributes->get('csp_nonce');
        $csp = "default-src 'self'; " .
            "script-src 'self' 'nonce-{$nonce}' https://www.google.com https://www.gstatic.com https://www.recaptcha.net; " .
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; " .
            "font-src 'self' data: https://fonts.gstatic.com; " .
            "img-src 'self' data: blob: file: https://www.google.com https://www.recaptcha.net; " .
            "frame-src https://www.google.com https://www.recaptcha.net; " .
            "connect-src 'self' data: blob: file: https://www.google.com https://www.recaptcha.net; " .
            "base-uri 'self'; form-action 'self';";

        $response->headers->set('Content-Security-Policy', $csp, false);
        $response->headers->set('X-Frame-Options', 'DENY', false);
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload', false);
        $response->headers->set('X-Content-Type-Options', 'nosniff', false);
        $response->headers->set('X-XSS-Protection', '1; mode=block', false);
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade', false);
        $response->headers->set('Permissions-Policy', "geolocation=(), microphone=()", false);

        return $response;
    }
}
