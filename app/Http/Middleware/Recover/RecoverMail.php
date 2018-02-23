<?php

namespace App\Http\Middleware\Recover;

use Closure;
use App\Traits\Recovers\Recover as R;
use Illuminate\Support\Facades\Auth;

class RecoverMail
{
    use R;
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
        if($this->token($user)){
            return $next($request);
        }
        elseif(!$this->Qs($user)){
            return redirect(route('recoverSq.show'));
        }
        else{
            Session()->flash('success','Votre Validation est déjà établie');
            return redirect(url('/'),301);
        }
    }

}
