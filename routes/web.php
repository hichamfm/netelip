<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/llamada',[
        'uses'=>'HomeController@frmEnviar',
        'as'=>'netelip.frmEnviar'
    ]);
	
Route::post('/llamada', [
        'uses'=>'HomeController@enviar',
        'as'=>'netelip.enviar'
    ]);
Route::any('/llamdasSalientes', [
        'uses'=>'HomeController@llamadasSalientes',
        'as'=>'netelip.llamadasSalientes'
    ]);	
Route::any('/llamadasEntrantes', [
        'uses'=>'HomeController@llamadasEntrantes',
        'as'=>'netelip.llamadasEntrantes'
    ]);	
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
