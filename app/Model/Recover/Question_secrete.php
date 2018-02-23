<?php

namespace App\Model\Recover;

use Illuminate\Database\Eloquent\Model;

class Question_secrete extends Model
{
    protected $fillable = ['question'];

    public $timestamps = false;

    public function recovers()
    {
        return $this->hasMany('App\Model\Recover\Question_secrete');
    }
}
