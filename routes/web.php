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
Route::get('/executaBusca',  'InicialController@buscar');

Route::get('/acervo','InicialController@acervo');
Route::get('/localizacao','InicialController@localização');
Route::get('/sobre', 'InicialController@sobre');

Route::resource('ficha', 'FichaController')
	->except(['destroy']);
Route::get('/ficha/{ficha}', 'FichaController@destroy')->name('ficha.destroy');

Route::resource('noticia', 'NoticiaController');

Route::get('crop-image-upload', 'CropImageController@index');
Route::post('/noticia/crop-image-upload ', 'CropImageController@uploadCropImage');

