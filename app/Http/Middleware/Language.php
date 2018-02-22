<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Config;
use Session;

class Language
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
        if(Session::has('locale')){
            $locale = Session::get('locale',Config::get('app.locale'));
        }
        else{
            $locale = 'ar';
        }

        App::setLocale($locale);
        return $next($request);
    }
}
