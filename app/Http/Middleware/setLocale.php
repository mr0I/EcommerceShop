<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('lang') === 'fa') {
            App::setLocale('fa');
        } else {
            App::setLocale('en');
        }
        return $next($request);
    }
}
