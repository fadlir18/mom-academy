<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;
use App\Helpers\AppHelper;

class Checklogin
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
        if (empty(AppHelper::auth('user_login'))) {
            return redirect('/login');
        } else {
            return $next($request);
        }
    }
}
