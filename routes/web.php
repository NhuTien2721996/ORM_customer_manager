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
Route::prefix('customers')->group(function () {
    Route::get('index', 'CustomerController@index')->name('customers.index');
    Route::get('create', 'CustomerController@create')->name('customers.create');
    Route::post('create', 'CustomerController@add')->name('customers.add');
    Route::get('delete/{id}', 'CustomerController@delete')->name('customers.delete');
    Route::get('edit/{id}', 'CustomerController@edit')->name('customers.edit');
    Route::post('edit/{id}','CustomerController@update')->name('customers.update');
    Route::get('search', 'CustomerController@search')->name('customers.search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
