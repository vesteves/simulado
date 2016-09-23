<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function(){
	return redirect()->route('principal');
});
Route::get('/correios_resposta', function(){
	return redirect()->route('principal');
});

Route::get('correios', 'CorreiosController@index')->name('principal');
Route::post('correios', 'CorreiosController@consultar');