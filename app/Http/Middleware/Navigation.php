<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Navigation
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
        if(!$request->ajax()){
            $url = str_replace("http://", "", url()->current());
            $url = str_replace("/", "+", $url);
            return redirect()->route('layout', compact('url'));
        }
        return $next($request);
    }
}
