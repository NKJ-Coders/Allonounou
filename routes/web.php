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
Route::get('/verify/{compte_di?}', 'Auth\RegisterController@getVerify')->name('verify');

Route::post('/verify', 'Auth\RegisterController@postVerify')->name('verify');
Route::get('/verify/reset/{compte_di?}', 'Auth\RegisterController@reset')->name('reset');

Route::put('/update/{compte_di?}', 'CompteController@update')->name('update');
Route::get('/update', 'CompteController@getupdate')->name('update');






















Route::get('/profil/create/{compte}', 'ProfilController@create')->name('profil.create');
Route::post('/profil', 'ProfilController@store');
Route::get('/profil/show/{user}', 'ProfilController@show')->name('profil.show');


Route::get('/tache/create', 'TacheController@create');
Route::get('/tache/store', 'TacheController@store');
Route::get('/tache', 'TacheController@index');

Route::get('/registration/{type_compte}', 'Auth\RegisterController@showRegisterForm')->name('registration');

Route::name('registration.')->group(function () {
    Route::post('/registration/recruteur', 'Auth\RegisterController@storeRecruteur')->name('recruteur');

    Route::post('/registration/demandeur', 'Auth\RegisterController@storeDemandeur')->name('demandeur');
});

Route::get('compte/list', 'CompteController@index')->name('compte');
Route::get('mes_candidatures', 'Annonce_recruteurController@mesCandidatures')->name('mes_candidatures');

Route::get('/Admin', 'DashboardController@index')->name('dashboard');

Route::get('/offres/list', 'Annonce_recruteurController@list')->name('annonce-recruteur.list');
Route::get('/annonce_recruteur/postuler/{annonce}', 'Annonce_recruteurController@postuler')->name('annonce-recruteur.postuler');

Route::post('/imageCrop', 'ImageCropController@store')->name('imageCrop');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
