<?php

namespace App\Http\Controllers\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class PermissionsController extends Controller
{
    public function index()
    {
        Cookie::queue('permission_cookies', true, 60*60*60);
        return redirect()->back();
    }
}
