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
Route::group(['middleware' => ['auth']], function () {

});


Route::auth();

Route::get('/home', 'HomeController@index');

// admin  //////////////////////////////////////////////////
Route::get('/admin/main', [ 'uses' => 'Main@index' , 'middleware' => ['auth', 'userActive']]);

Route::get('/admin/acuerdos' , [ 'uses' =>'Acuerdos@index' , 'middleware' => ['auth' , 'userActive']]);

Route::get('/admin/eventos' , [ 'uses' => 'Eventos@index' , 'middleware' => ['auth' , 'userActive']]);
Route::get('/admin/noticias' , [ 'uses' => 'Noticias@index' , 'middleware' => ['auth' , 'userActive']]);

Route::get('/admin/repositorio' , ['uses' => 'Archivos@index' , 'middleware' => ['auth' , 'userActive']]);

Route::get('/admin/sede' , [ 'uses' => 'Sedes@index' , 'middleware' => ['auth' , 'userActive' , 'admin'] ]);

Route::get('/admin/users' , ['uses' => 'Users@index' , 'middleware' => ['auth', 'userActive' , 'admin']]);

Route::get('/logOut' , ['middleware' => ['auth' , 'userActive'], function(){
	Auth::logout();
	return view('index', ['homeActive' => true]);
}]);

////////////////////////////////////////////////////
// Users
Route::post('users/updatePassword/{id}', 'Users@updatePassword')->name('users.update.password');

Route::post('users/deleteUser/' , ['uses' => 'Users@delete' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('users.delete');

Route::post('users/activateUser/',  ['uses' => 'Users@activateUser' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('users.activateUser');



Route::resource('users', 'Users' , ['middleware' => ['auth' , 'userActive']]);

////////////////////////////////////////////////////
// Sedes

Route::post('sedes/updateSede/' , ['uses' => 'Sedes@updateSede' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('sedes.updateSede');

Route::post('sedes/deleteSede/' , ['uses' => 'Sedes@deleteSede' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('sedes.deleteSede');

Route::resource('sedes', 'Sedes' , ['middleware' => ['auth' , 'userActive']]);

////////////////////////////////////////////////////
// Categorias

Route::post('categoria/store' , ['uses' => 'Categorias@store' ,  'middleware' => ['auth' , 'userActive']])->name('categoria.store');
Route::post('categoria/delete' , ['uses' => 'Categorias@delete' ,  'middleware' => ['auth' , 'userActive']])->name('categoria.delete');


////////////////////////////////////////////////////
// Repositorio

Route::post('repositorio/store' , ['uses' => 'Archivos@store' ,  'middleware' => ['auth' , 'userActive']])->name('repositorio.store');
Route::post('repositorio/delete' , ['uses' => 'Archivos@delete' ,  'middleware' => ['auth' , 'userActive']])->name('repositorio.delete');
Route::post('repositorio/updateData' , ['uses' => 'Archivos@updateData' ,  'middleware' => ['auth' , 'userActive']])->name('repositorio.updateData');
Route::get('repositorio/categoria/{id}' , ['uses' => 'Archivos@indexCategory' ,  'middleware' => ['auth' , 'userActive']])->name('repositorio.indexCategory');






////////////////////////////////////////////////
// Descargar archivos 
///////////////////////////////////////////////
Route::get('file/getRepositorio/{id}' , ['uses' => 'Archivos@getFileRepositorio' ,  'middleware' => ['auth' , 'userActive']])->name('file.getRepositorio');
