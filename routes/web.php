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

Route::get('/', 'InicialController@index');

Route::get('/acervo','InicialController@acervo');

Route::get('/localizacao','InicialController@localização');

Route::get('/sobre', 'InicialController@sobre');

Route::get('/executaBusca',  'InicialController@buscar');

Route::get('resultadosBusca', function () {
	$users = App\User::paginate(15);
	$users->withPath('custom/url');
});

Auth::routes();

Route::get('/home', 'InicialController@index')->name('home');
