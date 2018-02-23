<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Illuminate\Support\Facades\Lang;

class LanguageController extends Controller
{
    /**
     * @desc To change the Current language
     * @request ajax
     * @param Request $request
     */

    public function changeLanguage(Request $request)
    {
        if($request->ajax()){
            $request->session()->put('locale',$request->locale);
        }
    }
}
