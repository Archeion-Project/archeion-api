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

Auth::routes();

Route::get('/', 'InicialController@index');

Route::get('/acervo','InicialController@acervo');

Route::get('/localizacao','InicialController@localização');

Route::get('/sobre', 'InicialController@sobre');

Route::resource('noticia', 'NoticiaController')
	->except(['update']);

Route::patch('/noticia-update/{noticia}', 'NoticiaController@update')->name('update-noticia');

Route::resource('ficha', 'FichaController');
// 	->except(['update']);

// Route::patch('/ficha-update/{ficha}', 'FichaController@update')->name('update-ficha');

Route::post('/crop-image', 'CropImageController@uploadCropImage')->name('upload-image');

Route::get('/executaBusca',  'InicialController@buscar');

