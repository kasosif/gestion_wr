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
    Route::get('/employes', 'EmployeController@index')->name('employe.index');
    Route::get('/employes/ajout', 'EmployeController@create')->name('employe.ajout');
    Route::post('/employes/store', 'EmployeController@store')->name('employe.store');
    Route::delete('/employes/destroy/{cin?}', 'EmployeController@destroy')->name('employe.destroy');
    Route::get('/employes/edit/{cin}', 'EmployeController@edit')->name('employe.edit');
    Route::put('/employes/update/{cin}', 'EmployeController@update')->name('employe.update');

});
