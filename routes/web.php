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

    Route::get('/factures', 'FactureController@index')->name('factures.index');
    Route::get('/facture/ajout', 'FactureController@create')->name('facture.create');
    Route::post('/facture/store', 'FactureController@store')->name('facture.store');
    Route::delete('/facture/destroy/{id}', 'FactureController@destroy')->name('facture.destroy');
    Route::get('/facture/edit/{id}', 'FactureController@edit')->name('facture.edit');
    Route::put('/factures/update/{id}', 'FactureController@update')->name('facture.update');
    Route::get('/factures/details/{id}', 'FactureController@show')->name('facture.show');

});
