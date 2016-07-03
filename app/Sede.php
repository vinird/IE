<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
     protected $fillable = [
        'name', 'link'
    ];
    public function user(){
    	return $this->hasMany('App\User');
    }
    public function evento(){
    	return $this->hasMany('App\Evento');
    }
}
