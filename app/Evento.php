<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'title', 'url_img', 'url_document', 'content', 'event_date', 'org'
    ];
    public function user(){
    	return $this->belognsTo('App\User');
    }
    public function sede(){
    	return $this->belognsTo('App\Sede');
    }
}
