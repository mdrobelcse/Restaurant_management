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



Auth::routes();

Route::get('/','HomeController@index')->name('welcome');

Route::post('/contact','ContactController@sendMessage')->name('contact.send');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');



Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
    Route::resource('slider','SliderController');


    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@destory')->name('reservation.destory');
    Route::get('reservation/{id}/show','ReservationController@show')->name('reservation.show');


    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');

});
