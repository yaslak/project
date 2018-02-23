<?php

namespace App\Http\Middleware\Recover;

use App\Model\Recover\Recover;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Traits\Recovers\Recover as R;

class Recovered
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
        if(Auth::user()){
            $user = Auth::user();
            if(!$user->recover_id){
                return redirect()->route('recover.recover');
            }
            else{
                $recover = Recover::where([
                    ['id',$user->recover_id],['email','!=',1]
                ])->orWhere([
                    ['id',$user->recover_id],['response','!=',0]
                ])->first();
                if($recover){
                    return redirect()->route('recover.recover');
                }

            }
        }
        return $next($request);
    }
}
