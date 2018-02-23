<?php

namespace App\Traits\Password;

trait TargetTrait
{
    protected function Recover($update_password,$token)
    {
        $recover = $update_password->where('token',$token)->first();
        if($recover){
            return $recover->recover;
        }
        return null;
    }
}