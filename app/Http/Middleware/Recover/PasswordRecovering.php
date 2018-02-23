<?php

namespace App\Http\Middleware\Recover;

use App\Model\Auth\Password\update_password;
use Closure;

class PasswordRecovering
{

    /**
     * @var update_password
     */
    private $update_password;

    public function __construct(update_password $update_password)
    {
        $this->update_password = $update_password;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $recovering = $this->recovering($this->update_password,$request->token);
        if($recovering){
            $request['recover_id'] = $recovering->recover_id;
            return $next($request);
        }
        return $this->redirect();
    }

    private function recovering($update_password, $token)
    {
        return $update_password->where('token',$token)->select('recover_id')->first()?:null;
    }

    private function redirect()
    {
        Session()->flash('success','veuillez ne pas jouer avec les URLs');
        return redirect()->route('reset.target.show');
    }
}
