<?php

namespace WorkCity\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LogLastAdminActivity
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
        if (Auth::guard('admin')->check()){
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('admin-is-online-'.Auth::guard('admin')->user()->id,true,$expiresAt);
        }
        return $next($request);
    }
}
