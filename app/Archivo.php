<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
        'name', 'title', 'file_route', 'categoria_id', 'extension', 'keyWords', 'editable', 'user_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function Categoria(){
    	return $this->belongsTo('App\Categoria');
    }
}
