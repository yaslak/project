<?php

namespace App\Traits\Recovers;

use App\Mail\recoverMail;

trait Recover
{
    public $recovers;
    public $token;

    /**
     * detect if user has any recover
     * @param $user
     * @return bool
     */

    public function recover($user)
    {
        return $this->recovers ?: $this->recovers = $user->recover_id;
    }

    /**
     * detect if user has recover mail
     * @param $user
     * @return mixed
     */
    public function token($user)
    {
        return $this->token ?: $this->token = $user->recover->token;
    }

    /**
     * detect if user has recover QS
     * @param $user
     * @return bool
     */
    public function Qs($user)
    {
        return $user->recover->question_id ?:  false;
    }

    public function send($user,$token,$mailer){
        $mailer->to($user->email)->send(new recoverMail($user,$token));
    }
}