<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastName', 'userType', 'sede_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sede(){
        return $this->belongsTo('App\Sede');
    }
    public function evento(){
        return $this->hasMany('App\Evento');
    }
    public function noticia(){
        return $this->hasMany('App\Noticia');
    }
    public function categoria(){
        return $this->hasMany('App\Archivo');
    }
    public function acuerdo(){
        return $this->hasMany('App\Acuerdo');
    }
}
