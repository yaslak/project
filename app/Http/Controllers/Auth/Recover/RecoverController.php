<?php

namespace App\Http\Controllers\Auth\Recover;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Recovers\Recover as TraitsRecover;
use App\Model\Recover\Recover;

class RecoverController extends Controller
{
    use TraitsRecover;




    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if(!$this->recover($user)){
            return view('recover.recover',compact('user'));
        }
        return redirect(route('recoverMail.show'));
    }

    public function store()
    {
        $user = Auth::user();
        $this->createRecover($user);
        return redirect(route('recoverMail.show'));
    }

    private function createRecover ($user){
        $token = rand();
        $recover = Recover::create(['email'=>false,'token'=>$token]);
        $user->recover()->associate($recover)->save();
        return $token;
    }

}
