<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\LpRequest;
use App\Model\Auth\Password\Old_password;
use App\Model\Auth\Password\update_password;
use Illuminate\Support\Facades\Hash;

class Last_passwordController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('recover.password');
    }

    public function index($token)
    {
        return view('auth.passwords.lp',compact('token'));
    }

    public function store(LpRequest $request,update_password $update_password,Old_password $old_password,$token)
    {
        $this->check($old_password,$request->recover_id,$request->password)
            ? $this->tally($update_password,$request->recover_id) :null;
        return redirect()->route('reset.sq.show',$token);

    }

    private function check($old_password, $id, $password)
    {
        $recover = $old_password->where('recover_id',$id)->first();
        if($recover){
            return Hash::check($password,$recover->password) ?: null;
        }
        return null;

    }

    private function tally($update_password,$id)
    {
        $update_password->where('recover_id',$id)->update(['last_password'=>true]);
    }


}
