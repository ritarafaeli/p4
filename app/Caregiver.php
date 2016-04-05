<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    public function caregiver(){
        return $this->hasOne('\App\User');
    }
    
    //get the user of the carevgiver
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

}
