<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Requests\Auth\Password\NpswRequest;
use App\Http\Controllers\Controller;
use App\Model\Auth\Password\Old_password;
use App\Model\Auth\Password\update_password;
use App\Traits\Password\TargetTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class NpswController extends Controller
{

    use TargetTrait;

    /**
     * show new password form
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($token)
    {
        return view('auth.passwords.new_password',compact('token'));
    }

    /**
     * update password and insert current password in old_password
     * @param NpswRequest $request
     * @param update_password $update_password
     * @param Old_password $old_password
     * @param $token
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(NpswRequest $request,update_password $update_password, Old_password $old_password,$token)
    {
        $recover = $this->Recover($update_password,$token);
        if($recover){
            $old = $this->old_password_id($old_password,$recover->id);
            if($old){
                $check = $this->check($old_password,$recover->id,$request->password);
                if(!$check){
                    // update password
                    $current_password = $this->current_password($recover);
                    $this->insertOldPassword($current_password,$recover->id,$old_password);
                    $this->new_password($request->password,$recover);
                    $this->delete_update_password($update_password,$recover->id);
                    Session()->flash('success','votre mot passe est modifier');
                    return redirect()->route('home');
                }
                return back()->withErrors(['password'=>'ce mot de passe a été déjà modifier'])->withInput(['password']);
            }
        }
        return view('auth.passwords.expiredToken');
    }

    /**
     * old passwords membre
     * @param $old
     * @param $id
     * @return null
     */
    private function old_password_id($old, $id)
    {
        return $old->where('recover_id',$id)->first() ?: null;
    }

    /**
     * check if new password never used before
     * @param $old_password
     * @param $id
     * @param $password
     * @return null
     */
    private function check($old_password, $id,$password)
    {
        $recover = $old_password->where('recover_id',$id)->first();
        if($recover){
            return Hash::check($password,$recover->password) ?: null;
        }
        return null;
    }

    /**
     * get current password
     * @param $recover
     * @return mixed
     */
    private function current_password($recover)
    {
        return $recover->users->first()->password;
    }

    /**
     * insert current password in old password
     * @param $current_password
     * @param $recover_id
     * @param $old_password
     */
    private function insertOldPassword($current_password,$recover_id,$old_password)
    {
        $old_password->insert([
            'recover_id'=>$recover_id,
            'password'=>$current_password,
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * update with new password
     * @param $password
     * @param $recover
     * @return mixed
     */
    private function new_password($password,$recover)
    {
        $user = $recover->users->first();
        return $user->update([
            'password'=>bcrypt($password)
        ]);
    }

    private function delete_update_password($update_password, $id)
    {
        $update_password->where('recover_id',$id)->first()->delete();
    }
}
