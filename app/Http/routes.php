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
Route::get('/', ['uses' => 'SlideImages@index'])->name('/');

// noticias
Route::get('noticias' , [ 'uses' => 'Noticias@indexInformativa' ])->name('noticias');

Route::get('eventos' , [ 'uses' => 'Eventos@indexInformativa' ])->name('eventos');
Route::get('eventos/{sede_id}' , [ 'uses' => 'Eventos@indexInformativaFiltrada' ])->name('filtroEventos');

// ubicacion
Route::get('ubicacion' , [ 'uses' => 'Sedes@indexInformativa' ])->name('ubicacion');

// contactos
Route::get('contactos', ['uses' => 'Main@indexInformativa'])->name('contactos');

//////////////////////////

// Auth
Route::group(['middleware' => ['auth']], function () {

});
 

Route::auth();

Route::get('/home', 'HomeController@index');

// admin  //////////////////////////////////////////////////
Route::get('/admin/main', [ 'uses' => 'Main@index' , 'middleware' => ['auth', 'userActive']])->name('admin.main');
Route::get('/admin/acuerdos' , [ 'uses' =>'Acuerdos@index' , 'middleware' => ['auth' , 'userActive']]);
Route::get('/admin/eventos' , [ 'uses' => 'Eventos@index' , 'middleware' => ['auth' , 'userActive']]);
Route::get('/admin/noticias' , [ 'uses' => 'Noticias@index' , 'middleware' => ['auth' , 'userActive']]);
Route::get('/admin/repositorio' , ['uses' => 'Archivos@index' , 'middleware' => ['auth' , 'userActive']]);
Route::get('/admin/sede' , [ 'uses' => 'Sedes@index' , 'middleware' => ['auth' , 'userActive' , 'admin'] ]);
Route::get('/admin/users' , ['uses' => 'Users@index' , 'middleware' => ['auth', 'userActive' , 'admin']]);
Route::get('/logOut' , ['middleware' => ['auth' , 'userActive'], function(){
	Auth::logout();
	return redirect('/');
}]);
Route::get('/changeUser' , ['middleware' => ['auth' , 'userActive'], function(){
	Auth::logout();
	return view('auth.login', ['homeActive' => true]);
}]);

////////////////////////////////////////////////////
// Users
Route::post('users/updatePassword/{id}', 'Users@updatePassword')->name('users.update.password');
Route::post('users/deleteUser/' , ['uses' => 'Users@delete' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('users.delete');
Route::post('users/deleteAll' , ['uses' => 'Users@deleteAll' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('users.deleteAll');
Route::post('users/activateUser/',  ['uses' => 'Users@activateUser' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('users.activateUser');
Route::get('users/clearNewUsers',  ['uses' => 'Users@clearNewUsers' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('users.clearNewUsers');

Route::post('users/modifyIMG',  ['uses' => 'Users@modifyIMG' , 'middleware' => ['auth' , 'userActive']])->name('users.modifyIMG');

Route::resource('users', 'Users' , ['middleware' => ['auth' , 'userActive']]);

////////////////////////////////////////////////////
// Noticias


Route::post('noticias/store' , ['uses' => 'Noticias@store' ,  'middleware' => ['auth' , 'userActive']])->name('noticias.store');

Route::post('noticias/modify' , ['uses' => 'Noticias@modify' , 'middleware' => ['auth' , 'userActive']])->name('noticias.modify');

Route::post('noticias/delete' , ['uses' => 'Noticias@delete' , 'middleware' => ['auth' , 'userActive']])->name('noticias.delete');

////////////////////////////////////////////////////
// Eventos

Route::post('eventos/store' , ['uses' => 'Eventos@store' ,  'middleware' => ['auth' , 'userActive']])->name('eventos.store');

Route::post('eventos/modify' , ['uses' => 'Eventos@modify' , 'middleware' => ['auth' , 'userActive']])->name('eventos.modify');

Route::post('eventos/delete' , ['uses' => 'Eventos@delete' , 'middleware' => ['auth' , 'userActive']])->name('eventos.delete');


////////////////////////////////////////////////////
// Sedes
Route::post('sedes/updateSede/' , ['uses' => 'Sedes@updateSede' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('sedes.updateSede');
Route::post('sedes/deleteSede/' , ['uses' => 'Sedes@deleteSede' , 'middleware' => ['auth' , 'userActive' , 'admin']])->name('sedes.deleteSede');
Route::resource('sedes', 'Sedes' , ['middleware' => ['auth' , 'userActive' , 'admin']]);

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


////////////////////////////////////////////////////
// Acuerdos

Route::post('acuerdos/store' , ['uses' => 'Acuerdos@store' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.store');
Route::post('acuerdos/delete' , ['uses' => 'Acuerdos@delete' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.delete');
Route::post('acuerdos/complete' , ['uses' => 'Acuerdos@complete' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.complete');
Route::post('acuerdos/modify' , ['uses' => 'Acuerdos@modify' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.modify');
Route::post('acuerdos/open' , ['uses' => 'Acuerdos@open' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.open');
Route::post('acuerdos/agregarSeguimiento' , ['uses' => 'Acuerdos@agregarSeguimiento' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.agregarSeguimiento');
Route::post('acuerdos/modificarSeguimiento' , ['uses' => 'Acuerdos@modificarSeguimiento' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.modificarSeguimiento');
Route::post('acuerdos/eliminarSeguimiento' , ['uses' => 'Acuerdos@eliminarSeguimiento' ,  'middleware' => ['auth' , 'userActive']])->name('acuerdos.eliminarSeguimiento');



////////////////////////////////////////////////
// Descargar archivos
///////////////////////////////////////////////
Route::get('file/getRepositorio/{id}' , ['uses' => 'Archivos@getFileRepositorio' ,  'middleware' => ['auth' , 'userActive']])->name('file.getRepositorio');
Route::get('file/getAcuerdos/{id}' , ['uses' => 'Acuerdos@getFileAcuerdos' ,  'middleware' => ['auth' , 'userActive']])->name('file.getAcuerdos');
Route::get('file/getNoticia/{id}' , ['uses' => 'Noticias@getFileNoticia'])->name('file.getNoticia');
Route::get('file/getEvento/{id}' , ['uses' => 'Eventos@getFileEvento'])->name('file.getEvento');


////////////////////////////////////////////////
// Notificaciones
///////////////////////////////////////////////
Route::get('notification/clearNotification' , ['uses' => 'Notifications@clearNotification' ,  'middleware' => ['auth' , 'userActive']])->name('notification.clearNotification');

////////////////////////////////////////////////
// Mensajes
///////////////////////////////////////////////
Route::post('mensajes/store' , ['uses' => 'Mensajes@store' ,  'middleware' => ['auth' , 'userActive']])->name('mensajes.store');
Route::get('mensajes/clearMessages' , ['uses' => 'Mensajes@clearMessages' ,  'middleware' => ['auth' , 'userActive']])->name('mensajes.clearMessages');
Route::get('mensajes/get/{sendBy}' , ['uses' => 'Mensajes@getSendBy' , 'middleware' => ['auth' , 'userActive']])->name('mensajes.sendBy');

////////////////////////////////////////////////
// slideImages
///////////////////////////////////////////////
Route::post('slideImages/store' , ['uses' => 'SlideImages@store' ,  'middleware' => ['auth' , 'userActive']])->name('slideImages.store');
Route::get('slideImages/delete/{id}' , ['uses' => 'SlideImages@delete' ,  'middleware' => ['auth' , 'userActive']])->name('slideImages.delete');
