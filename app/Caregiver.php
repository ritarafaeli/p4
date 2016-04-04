<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    public function caregiver(){
        return $this->hasOne('\App\User');
    }

}
