<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'title', 'url_img', 'url_document', 'content', 'auth' 
    ];
    public function user(){
    	return $this->belognsTo('App\User');
    }
}
