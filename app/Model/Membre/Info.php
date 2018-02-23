<?php

namespace App\Model\Membre;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    //
    public $fillable = ['photo','first_name','last_name','dtn','address','tel','created_at','updated_at'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
