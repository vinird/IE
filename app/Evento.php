<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'titulo', 'url_img', 'url_document', 'content', 'titulo', 'auth', 'user_id', 'event_date'
    ];
    public function user(){
    	return $this->belognsTo('App\User');
    }
}
