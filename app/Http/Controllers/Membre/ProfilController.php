<?php

namespace App\Http\Controllers\Membre;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {

        $this->user = $user;
    }

    public function index($slug = null)
    {
        if(is_null($slug)){
            return $this->myProfil();
        }
       return $this->getProfil($slug);
    }

    private function myProfil()
    {
        $user = $this->user->where('id',Auth::user()->id)->first()->info;
        return view('profil.membreProfil')->with(['user'=> Auth::user(),'output'=>$user]);
    }

    public function update(Request $request){
        if(isset($request->name)){
            dd($request);
        }
        dd('!isset');
        $user = $this->user->where('id',Auth::user()->id)->first()->info;
    }

    private function getProfil($slug)
    {
        return 'get profil';
    }
}
