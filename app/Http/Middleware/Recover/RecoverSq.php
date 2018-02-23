<?php

namespace App\Http\Middleware\Recover;

use App\Traits\Recovers\Recover;
use Closure;
use Illuminate\Support\Facades\Auth;

class RecoverSq
{
    use Recover;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if(!$this->recover($user)){
            return redirect(route('recover.recover'));
        }
        elseif($this->token($user)){
            return redirect(route('recoverMail.show'));
        }
        elseif(!$this->Qs($user)){
            return $next($request);
        }
        else{
            Session()->flash('success','Votre Validation est déjà établie');
            return redirect(url('/'),301);
        }
    }
}
