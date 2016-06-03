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
    
	Route::resource('/acuerdos', 'Acuerdos');

});


Route::auth();

Route::get('/home', 'HomeController@index');

// admin
Route::get('/admin/acuerdos' , function(){
	return view('admin.acuerdos');
});
Route::get('/admin/main' , function(){
	return view('admin.adminMain');
});
Route::get('/admin/eventos' , function(){
	return view('admin.eventos');
});
Route::get('/admin/noticias' , function(){
	return view('admin.noticias');
});
Route::get('/admin/repositorio' , function(){
	return view('admin.repositorio');
});
Route::get('/admin/sede' , function(){
	return view('admin.sede');
});
Route::get('/admin/users' , function(){
	return view('admin.users');
});
