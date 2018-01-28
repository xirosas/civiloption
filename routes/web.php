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

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::resource('coordinador','CoordinadorController');
Route::resource('filtroCoordinador','FiltroCoordinadorController');
Route::resource('lider','LiderController');
Route::resource('votante','VotanteController');
//Route::resource('admin','AdminController');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('pdf/{id}','PdfController@totalVotantes');
Route::resource('pdf', 'PdfController');

Route::get('pdfmoto/{id}','PdfMotoController@totalVotantes');
Route::resource('pdfmoto', 'PdfMotoController');

Route::get('pdfcarro/{id}','PdfCarroController@totalVotantes');
Route::resource('pdfcarro', 'PdfCarroController');

Route::get('pdflider/{id}','PdfLiderController@totalVotantes');
Route::resource('pdflider', 'PdfLiderController');

Route::get('pdfcoordinador/{id}','PdfCoordinadorController@totalVotantes');
Route::resource('pdfcoordinador', 'PdfCoordinadorController');

Route::post('/checkcedulavotante',['uses'=>'ManageController@checkCedulaVotante']);
Route::post('/checkcedulalider',['uses'=>'ManageController@checkCedulaLider']);
Route::post('/checkcedulacoordinador',['uses'=>'ManageController@checkCedulaCoordinador']);

