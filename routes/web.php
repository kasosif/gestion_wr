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

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/employes', 'EmployeeController@index')->name('employe.index');
    Route::get('/employes/ajout', 'EmployeeController@create')->name('employe.ajout');
    Route::post('/employes/store', 'EmployeeController@store')->name('employe.store');
    Route::delete('/employes/destroy/{id?}', 'EmployeeController@destroy')->name('employe.destroy');
    Route::get('/employes/edit/{id}', 'EmployeeController@edit')->name('employe.edit');
    Route::put('/employes/update/{id}', 'EmployeeController@update')->name('employe.update');

    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::put('/profile/changepassword', 'ProfileController@changepassword')->name('profile.changepassword');
    Route::put('/profile/update', 'ProfileController@updateprofile')->name('profile.update');
    Route::patch('/profile/updatepicture', 'ProfileController@updateprofilepicture')->name('profile.changepicture');


    Route::get('/clients', 'ClientController@index')->name('clients.index');
    Route::get('/clients/ajout', 'ClientController@create')->name('clients.ajout');
    Route::post('/clients/store', 'ClientController@store')->name('clients.store');
    Route::delete('/clients/destroy/{id?}', 'ClientController@destroy')->name('clients.destroy');
    Route::get('/clients/edit/{id}', 'ClientController@edit')->name('clients.edit');
    Route::put('/clients/update/{id}', 'ClientController@update')->name('clients.update');

    Route::get('/factures', 'FactureController@index')->name('factures.index');
    Route::get('/facture/ajout', 'FactureController@create')->name('facture.create');
    Route::post('/facture/store', 'FactureController@store')->name('facture.store');
    Route::delete('/facture/destroy/{id}', 'FactureController@destroy')->name('facture.destroy');
    Route::get('/facture/edit/{id}', 'FactureController@edit')->name('facture.edit');
    Route::put('/factures/update/{id}', 'FactureController@update')->name('facture.update');
    Route::get('/factures/details/{id}', 'FactureController@show')->name('facture.show');


    Route::get('/contrats', 'ContratController@index')->name('contrats.index');
    Route::get('/contrat/ajout', 'ContratController@create')->name('contrat.create');
    Route::post('/contrat/store', 'ContratController@store')->name('contrat.store');
    Route::delete('/contrat/destroy/{id?}', 'ContratController@destroy')->name('contrat.destroy');
    Route::get('/contrat/edit/{id}', 'ContratController@edit')->name('contrat.edit');
    Route::put('/contrat/update/{id}', 'ContratController@update')->name('contrat.update');

    Route::get('/ajax/contracts/{client_id?}','AjaxController@contracts')->name('ajax.contracts');

});
