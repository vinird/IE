<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $fillable = [
        'message', 'sendBy', 'takeBy'
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
