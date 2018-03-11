<?php

namespace App\Http\Controllers\App;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index($url){
        if(Auth::user()){
            $info = $this->info(Auth::user()->id);
            return view('layouts.layout')->with(['url'=>$url,'user'=>Auth::user(),'info'=>$info]);
        }
        return view('layouts.layout')->with(['url'=>$url]);
    }

    private function info(int $id)
    {
        $user = User::where('id',$id)->first();
        if(isset($user->info_id)){
            return $user->info;
        }
        return false;
    }
}
