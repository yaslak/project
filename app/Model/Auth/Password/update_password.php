<?php

namespace App\Model\Auth\Password;

use Illuminate\Database\Eloquent\Model;

class update_password extends Model
{

    public $fillable = ['recover_id','cible','last_password','token','code','created_at','update_at'];

    public function recover()
    {
        return $this->belongsTo('App\Model\Recover\Recover');
    }
}
