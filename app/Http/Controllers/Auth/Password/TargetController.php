<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\TargetRequest;
use App\Model\Auth\Password\update_password;
use App\Model\Recover\Recover;
use App\User;
use Carbon\Carbon;

class TargetController extends Controller
{
    /**
     * show form target membre
     * @param update_password $update_password
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(update_password $update_password)
    {
        $this->clearUpdatePassword($update_password);
        return view('auth.passwords.target');
    }

    /**
     * start the targeting process
     * @param TargetRequest $request
     * @param User $user
     * @param Recover $recover
     * @param update_password $update_password
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(TargetRequest $request,User $user,Recover $recover,update_password $update_password)
    {
        $user_id = $this->target($user, $request->target);
        if($user_id){
            $recover_id = $this->recover($user,$recover, $user_id->id);
            if($recover_id){
                $token = $this->procedure($update_password,$recover_id->id);
                return redirect()->route('reset.lp.show',$token);
            }
            return view('auth.passwords.invalideRecover');
        }
        return back()
            ->withErrors(['target'=>'ce compte n\'existe pas'])
            ->withInput();
    }

    /**
     * check the recovery validation
     * @param $user
     * @param $recover
     * @param $id
     * @return null
     */
    private function recover($user, $recover, $id)
    {
        $recover_id = $user->select('recover_id')->where([
            ['id', $id],
            ['recover_id','!=',0]
        ])->first() ?: null;
        return $recover_id ? $this->recovered($recover, $recover_id->recover_id) : null;
    }

    /**
     * check the validation of the recovery tool
     * @param $recover
     * @param $id
     * @return null
     */
    private function recovered($recover, $id)
    {
        return $recover->select('id')->where([
           ['id',$id],['email','!=',0],['question_secrete_id','!=',0],['response','!=',null]
        ])->first() ?: null;
    }

    /**
     * user id with name target name | email
     * @param $user
     * @param $target
     * @return array|null
     */

    private function target($user, $target)
    {
        return $this->targetName($user , $target) ?: $this->targetEmail($user,$target);
    }

    /**
     * user_id with target name
     * @param $user
     * @param $name
     * @return null|array
     */

    private function targetName($user, $name)
    {
        return $user->select('id')->where('name',$name)->first() ?: null;
    }

    /**
     * user_id with target email
     * @param $user
     * @param $email
     * @return null|array
     */

    private function targetEmail($user, $email)
    {
        return $user->select('id')->where('email',$email)->first() ?: null;
    }

    /**
     * verification of the existence of the procedure
     * @param $update_password
     * @param $recover_id
     * @return string
     */

    private function procedure($update_password, $recover_id)
    {
        return $this->update_password($update_password,$recover_id)
            ?: $this->createToken($update_password,$recover_id);
    }

    /**
     * token recovery
     * @param $update_password
     * @param $recover_id
     * @return string
     */

    private function update_password($update_password, $recover_id)
    {
        $id = $update_password->select('token','code')->where('recover_id',$recover_id)->first();
        if($id){
            if($id->code){
                return $id->token;
            }
        }
        $this->deleteToken($update_password,$recover_id);
        return $this->createToken($update_password,$recover_id);
    }

    /**
     * creation of the recovery token
     * @param $update_password
     * @param $recover_id
     * @return string
     */
    private function createToken($update_password, $recover_id)
    {
        $code = rand();
        $token = sha1(md5($code));
        $update_password->insert([
            'recover_id' => $recover_id,
            'token' => $token,
            'code'=>$code,
            'created_at' => Carbon::now()
        ]);
        return $token;
    }

    private function clearUpdatePassword($update_password)
    {
        $time = Carbon::now()->addMinutes(3);
        $expired = $update_password->where('created_at','>',$time)->first();
        if($expired){
            $expired->delete();
        }
    }

    private function deleteToken($update_password, $recover_id)
    {
        $update_password->where('recover_id',$recover_id)->first()->delete();
    }
}
