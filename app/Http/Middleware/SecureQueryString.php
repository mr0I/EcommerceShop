<?php

namespace App\Http\Middleware;

use Closure;

class SecureQueryString
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
        if (! isset($_SERVER['QUERY_STRING'])) return $next($request);

        $queryString = $_SERVER['QUERY_STRING'];
        $blackList = array("script",">","<","'","%27","document","cookie","hack","%3E","%3C","%3e","%3c","alert");
        foreach ($blackList as $item){
            if (strpos($queryString,$item)) {
                die('No Script kiddies!');
            }
        }

        return $next($request);
    }
}
