<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
     protected $fillable = [
        'title', 'content', 'acuerdo_id'
    ];
    public function acuerdo(){
    	return $this->belognsTo('App\Acuerdo');
    }
}
