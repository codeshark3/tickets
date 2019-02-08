<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
     //table name
    protected $table = 'tickets';

    //primary key 
    public $primaryKey = 'id'; 

    //timestamps
    public $timestamp =true;


    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsTo('App\Category');
    }  

     public function specialist(){
        return $this->belongsTo('App\Specialist');
    }  
}
