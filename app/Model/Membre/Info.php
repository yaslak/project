<?php

namespace App\Model\Membre;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    //
    public $fillable = ['photo_cover','photo_profil','first_name','last_name','dtn','address','tel'];
    public $timestamps = false;
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
