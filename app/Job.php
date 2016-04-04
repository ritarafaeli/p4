<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function caregiver(){
        return $this->belongsTo('\App\Guardian');
    }
}
