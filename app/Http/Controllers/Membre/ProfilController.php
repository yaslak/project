<?php

namespace App\Http\Controllers\Membre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index()
    {
       return view('profil.membreProfil');
    }
}
