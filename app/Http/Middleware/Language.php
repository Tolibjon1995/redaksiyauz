<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('lang') && !empty(session('lang'))) {
            $lang = session('lang');
        } else {
            // Sessiyaga qiymat berilmagan holda, qo'shimcha tekshirish:
            $lang = 'uz';
        }

    \App::setLocale($lang);
    return $next($request);
    }
}
