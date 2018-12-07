<?php

namespace WorkCity\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LogLastCoordActivity
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
        if (Auth::guard('coord')->check()){
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('coord-is-online-'.Auth::guard('coord')->user()->id,true,$expiresAt);
        }
        return $next($request);
    }
}
