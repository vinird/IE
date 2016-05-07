<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// informativa views /////////////
// index
Route::get('/', function () {
    return view('index', ['homeActive' => true]);
})->name('/');

// noticias
Route::get('noticias', function(){
	return view('informativa.noticias', ['noticiasActive' => true]);
})->name('noticias');

// eventos
Route::get('eventos', function(){
	return view('informativa.eventos', ['eventosActive' => true]);
})->name('eventos');

// ubicacion
Route::get('ubicacion', function(){
	return view('informativa.ubicacion', ['ubicacionActive' => true]);
})->name('ubicacion');

// contactos
Route::get('contactos', function(){
	return view('informativa.contactos', ['contactosActive' => true]);
})->name('contactos');
//////////////////////////

// Auth
Route::get('/login', function(){
	return view('auth.login');
})->name('login');

