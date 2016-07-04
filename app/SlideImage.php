<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model
{
    protected $fillable = [
        'url', 'user',
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
} 
