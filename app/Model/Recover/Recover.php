<?php

namespace App\Model\Recover;

use Illuminate\Database\Eloquent\Model;

class Recover extends Model
{

    public $fillable = ['email','token','response','question_secrete_id','created_at','updated_at'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function Question_secrete()
    {
        return $this->belongsTo('App\Model\Recover\Question_secrete');
    }

    public function Old_password()
    {
        return $this->belongsTo('App\Model\Recover\Question_secrete');
    }
}
