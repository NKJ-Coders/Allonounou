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

// Route::get('/annonce-recruteur/create', 'Annonce_recruteurController@create');
// Route::post('/annonce-recruteur', 'Annonce_recruteurController@store');
// Route::get('/annonce-recruteur', 'Annonce_recruteurController@index');
// Route::delete('/annonce-recruteur/{annonce}/delete', 'Annonce_recruteurController@destroy');
// Route::get('/annonce-recruteur/{annonce}/edit', 'Annonce_recruteurController@edit');
// Route::patch('/annonce-recruteur/{annonce}', 'Annonce_recruteurController@update');

Route::resource('annonce-recruteur', 'Annonce_recruteurController');


























Route::get('/profil/create', 'ProfilController@create');
Route::post('/profil', 'ProfilController@store');
