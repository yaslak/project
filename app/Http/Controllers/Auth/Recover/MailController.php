<?php

namespace App\Http\Controllers\Auth\Recover;

use App\Http\Requests\Recover\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use App\Traits\Recovers\Recover as RecoverTrait;

class MailController extends Controller
{
    use RecoverTrait;


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('recover.mail');
    }

    public function index(Mailer $mailer)
    {
        $user = Auth::user();
        return $this->mail($user,$this->token($user),$mailer,'le mail a été envoyer');
    }

    public function return(Mailer $mailer)
    {
        $user = Auth::user();
        return $this->mail($user,$this->token($user),$mailer,'le mail a été renvoyer');
    }

    public function mail($user, $token, $mailer, $success)
    {
       // $this->send($user,$token,$mailer);
        Session()->flash('success',$success);
        return view('recover.email');
    }

    public function store(Mail $request)
    {
        $user = Auth::user();
        if($this->token($user) != $request->token){
           return view('recover.email')->withErrors(['token'=>'le code que vous indiquez est erroné']);
        }
        $user->recover()->update(['email'=>true, 'token' => false]);
        Session()->flash('success','Votre adresse mail est bien été valider');
        return redirect(url(route('recoverSq.show')));
    }

}
