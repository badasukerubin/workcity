<?php

namespace WorkCity\Http\Middleware;

use Closure;

class CheckReferral
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
        $response = $next($request);
        if (!$request->hasCookie('referral')&&$request->query('ref')){
            //Cookie that lasts 5 in minutes
            $response->cookie('referral', encrypt($request->query('ref')), 300);
        }
        return $response;
    }
}
