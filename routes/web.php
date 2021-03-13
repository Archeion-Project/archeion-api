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

Route::get('/', 'InicialController@index')->name('inicio');

Route::get('/executaBusca',  'InicialController@buscar');

Route::get('/acervo','InicialController@acervo');

Route::get('/localizacao','InicialController@localização');

Route::get('/sobre', 'InicialController@sobre');

Route::resource('ficha', 'FichaController')
	->except(['destroy']);
Route::get('/ficha-delete/{ficha}', 'FichaController@destroy')->name('ficha.destroy');

Route::resource('noticia', 'NoticiaController')
	->except(['destroy']);
Route::get('/noticia-delete/{noticia}', 'NoticiaController@destroy')->name('noticia.destroy');

Route::resource('periodico', 'PeriodicoController');

Route::get('/periodico/{periodico}/{ano}', 'PeriodicoController@obterPeriodicosAno')->name('periodico.obterPeriodicosAno');

Route::get('/periodico/{periodico}/{ano}/{mes}', 'PeriodicoController@obterPeriodicosMes')->name('periodico.obterPeriodicosMes');

Route::get('/periodico/{periodico}/{ano}/{mes}/{dia}', 'PeriodicoController@obterPeriodicoIssue')->name('periodico.obterPeriodicoIssue');

Route::get('/periodico-page/{issue}/{page}', 'PeriodicoController@obterPeriodicoPage')->name('periodico.obterPeriodicoPage');

Route::get('/admin/gerenciar-periodicos', 'GerenciarPeriodicos@index')->name('gerenciar.periodicos');

Route::get('/admin/gerenciar-colecao-periodicos', 'GerenciarColecaoPeriodicos@index')->name('gerenciar.colecoes');

Route::get('noticia-abrir/{noticia}', 'InicialController@abrirNoticia')->name('noticia.abrir');

Route::get('crop-image-upload', 'CropImageController@index');
Route::post('/noticia/crop-image-upload ', 'CropImageController@uploadCropImage');

