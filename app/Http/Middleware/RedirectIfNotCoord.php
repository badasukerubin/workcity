<?php

namespace WorkCity\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCoord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'coord')
    {
        if (Auth::guard($guard)->check()){
            return redirect('coordinator/login');
        }
        return $next($request);
    }
}
