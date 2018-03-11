<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Requests\Auth\Password\MailRequest;
use App\Mail\Auth\Password\PasswordMail;
use App\Model\Auth\Password\update_password;
use App\Traits\Password\TargetTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    use TargetTrait;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('recover.password');
    }

    /**
     * trouver l'adresse mail
     * envoyer un mail de récupération avec le code de sécurité et le token
     * return la vu
     * @param update_password $update_password
     * @param Mailer $mailer
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(update_password $update_password,Mailer $mailer,$token)
    {
        $recover = $this->Recover($update_password,$token);
        if($recover){
            $valide = $this->valideMail($update_password,$token);
            if($valide){
                //$this->mail($update_password,$token,$mailer);
                return view('auth.passwords.email')->with(['token'=>$token]);
            }
            Session()->flash('success','veuillez ressayer a nouveau');
            return redirect(url(route('reset.target.show')));
        }
        return view('auth.passwords.expiredToken');
    }

    /**
     * send security code with mail
     * @param $update_password
     * @param $token
     * @param $mailer
     */
    public function mail($update_password,$token,$mailer)
    {
        $update = $update_password->where('token',$token)->first();
        $code = $update->code;
        $user = $update->recover()->first()->users()->first();
        $email = $user->email;
        $name = $user->name;
        $mailer->to($email)->send(new PasswordMail($name,$code));
    }

    /**
     * verifier le code de sécurité
     * update code security
     * redirect in new password
     * @param update_password $update_password
     * @param $token
     * @param MailRequest|Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(update_password $update_password,$token,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code'=>'required|string|min:6|max:255'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $recover = $this->Recover($update_password,$token);
        if($recover){
            $isset = $this->issetCode($update_password,$token);
            if(!$isset){
                $code = $this->code($update_password,$token,$request->code);
                if($code){
                    return redirect()->route('reset.npsw.show',compact('token'));
                }
                else{
                    return back()->withErrors(['code'=>'le code que vous indiquez est erroné'])->withInput();
                }
            }
            return view('auth.passwords.expiredToken');
        }
        return view('auth.passwords.expiredToken');
    }

    private function code($update_password, $token, $code)
    {
        return $update_password->where([['token',$token],['code',$code]])
            ->update(['code'=>false]);
    }

    private function valideMail($update_password, $token)
    {
        $update = $update_password->where('token',$token)->first();
        if(!$update->code){
            $update->delete();
            return false;
        }
        return true;
    }

    private function issetCode($update_password, $token)
    {
        return $update_password->where([['token',$token],['code',0]])->first();
    }


}
