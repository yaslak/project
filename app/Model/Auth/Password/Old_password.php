<?php

namespace App\Model\Auth\Password;

use Illuminate\Database\Eloquent\Model;

class Old_password extends Model
{

    public $fillable = ['user_id','password','created_at'];

    public $timestamps = false;

    public function recovers()
    {
        return $this->hasMany('App\Model\Recover\Recover');
    }
}
