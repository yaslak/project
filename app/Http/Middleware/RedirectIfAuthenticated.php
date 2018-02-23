<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }

        if(!Cookie::has('permission_cookies')){
            Session()->flash('permission_cookies','en vous navigant sur notre application vous accepter l\'enregistrement de nos cookies sur votre materiel');
        }

        return $next($request);
    }
}
