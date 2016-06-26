<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title', 'content', 'userName'
    ]; 

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
