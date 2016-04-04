<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    public function guardian(){
        return $this->hasOne('\App\User');
    }
    public function job(){
        return $this->hasMany('\App\Job');
    }
}
