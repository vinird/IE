<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
    protected $fillable = [
        'title', 'content', 'mainUser_id', 'primaryUser_id', 'keyWords', 'editable', 'user_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
