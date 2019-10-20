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

// Route::put('/foo/bar', function () {
//     return 'uau';
// });

Route::put('/foo/bar',  'HomeController@buscar');


Route::get('/{termo}', 'SystemController@index');

Route::get('/client_organizations/index/{componentPath?}', 'ClientOrganizationController@index')
->name('client_organization.index');

Auth::routes();

Route::get('/buscar', 'pesquisaAcervo@buscar');

Route::get('/home', 'HomeController@index')->name('home');
