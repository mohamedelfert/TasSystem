<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle($request, Closure $next)
    {
        //dd(session()->all());
        if (session()->has('lang')) {
            if (session()->get('lang') == 'ar') {
                App()->setlocale('ar');
            } else if (session()->get('lang') == 'en') {
                App()->setlocale('en');
            }
        }
        if (Cookie::get('star') && Cookie::get('star') == null) {
            $minutes = 1440;
            Cookie::queue('star', 1, $minutes);
        }
        return $next($request);
    }
}
