<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\SqRequest;
use App\Model\Auth\Password\update_password;
use App\Model\Recover\Recover;
use App\Traits\Password\TargetTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SqController extends Controller
{
    use TargetTrait;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('recover.password');
    }

    /**
     * show form with question_id and question
     * @param $token
     * @param update_password $update_password
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index($token,update_password $update_password)
    {
         $question = $this->Recover($update_password,$token);
         if($question){
             return view('auth.passwords.sq')->with(['question'=>$question,'token'=>$token]);
         }
         return view('auth.passwords.expiredToken');
    }

    public function store($token, Request $request,update_password $update_password)
    {
        $validator = Validator::make($request->all(), [
            'response' => 'required|max:255|min:5'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $recover = $this->Recover($update_password,$token);
        $sq =$this->response($recover->Question_secrete->id,$recover,$request->response);
        if($sq){
            $this->SqCreate($recover->id,$update_password);
            return redirect()->route('reset.mail.show',$token);
        }
        return back()->withErrors(['response'=>'Votre réponse ne correspond pas a nos enregistrement, Merci de verifier'])->withInput();
    }

    private function response($id,$recover,$response)
    {
        return $recover->where([['id',$id],['response',$response]])->first()?:null;
    }

    private function SqCreate($recover_id,$update)
    {
        $update->where('recover_id',$recover_id)->update(['sq'=>true]);
    }
}
