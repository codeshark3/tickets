<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    //

     public function tickets(){
        return $this->hasMany('App\Tickets');
    }
}
