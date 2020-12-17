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

Route::put('/compte/update/{compte_di?}', 'CompteController@update')->name('update');
Route::get('/compte/update', 'CompteController@getupdate')->name('update');
Route::get('/compte/modify/{compte_di?}', 'CompteController@getmodify')->name('compte.modify');


Route::post('/profil/update', 'ProfilController@update')->name('profil.update');
Route::get('/profil/update/{profil_di?}', 'ProfilController@getupdate')->name('profil.update');
Route::get('/profil/modify/{profil_di?}', 'ProfilController@getmodify')->name('profil.modify');

















Route::get('/profil/create/{compte}', 'ProfilController@create')->name('profil.create');
Route::post('/profil', 'ProfilController@store');
Route::get('/profil/show/{user}', 'ProfilController@show')->name('profil.show');
Route::get('/profil/index', 'ProfilController@index')->name('profil.index');
Route::get('/profil/statut/{profil}/{statut}', 'ProfilController@changeStatut')->name('profil.statut');
Route::get('/profil/delete/{profil}', 'ProfilController@destroy')->name('profil.delete');

Route::get('/tache/create', 'TacheController@create');
Route::get('/tache/store', 'TacheController@store');
Route::get('/tache', 'TacheController@index');

Route::get('/registration/{type_compte}', 'Auth\RegisterController@showRegisterForm')->name('registration');

Route::name('registration.')->group(function () {
    Route::post('/registration/recruteur', 'Auth\RegisterController@storeRecruteur')->name('recruteur');

    Route::post('/registration/demandeur', 'Auth\RegisterController@storeDemandeur')->name('demandeur');
});

Route::get('compte_demandeur/list', 'CompteController@index')->name('compte_demandeur');
Route::get('mes_candidatures', 'Annonce_recruteurController@mesCandidatures')->name('mes_candidatures');

Route::get('/Admin', 'DashboardController@index')->name('dashboard');

Route::get('/offres/list', 'Annonce_recruteurController@list')->name('annonce-recruteur.list');
Route::get('/annonce_recruteur/candidater', 'Annonce_recruteurController@candidater')->name('annonce-recruteur.candidater');

Route::post('/imageCrop', 'ImageCropController@store')->name('imageCrop');

Route::get('/localisation', 'LocalisationController@getLocalisation')->name('localisation');

Route::post('/offre/signaler', 'OffreController@signaler')->name('offre.signaler');
Route::get('/offre/liker', 'OffreController@liker')->name('offre.liker');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
