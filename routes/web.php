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

Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

Route::group(['prefix' => 'category'], function (){
    Route::get('index','CategoryController@index')->name('category.index');
    Route::get('create','CategoryController@create')->name('category.create');
    Route::post('store','CategoryController@store')->name('category.store');
    Route::get('edit/{id}','CategoryController@edit')->name('category.edit');
    Route::patch('edit/{id}/update','CategoryController@update')->name('category.update');
    Route::get('destroy/{id}','CategoryController@destroy')->name('category.destroy');
});

Route::group(['prefix' => 'transaction'], function (){
    Route::get('index','TransactionController@index')->name('transaction.index');
    Route::get('create','TransactionController@create')->name('transaction.create');
    Route::post('store','TransactionController@store')->name('transaction.store');
    Route::get('edit/{id}','TransactionController@edit')->name('transaction.edit');
    Route::patch('edit/{id}/update','TransactionController@update')->name('transaction.update');
    Route::get('destroy/{id}','TransactionController@destroy')->name('transaction.destroy');
    Route::post('search', 'TransactionController@search')->name('transaction.search');
});
