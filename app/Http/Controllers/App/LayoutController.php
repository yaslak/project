<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index($url){
        if(Auth::user()){
            return view('layouts.layout')->with(['url'=>$url,'user'=>Auth::user()]);
        }
        return view('layouts.layout')->with(['url'=>$url]);
    }
}
