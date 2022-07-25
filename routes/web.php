<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\ReservationController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/','HomeController@index')->name('home');
Route::get('/room','HomeController@room')->name('room');
Route::get('/restaurant','HomeController@restaurant')->name('restaurant');
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/room/details/{id}','HomeController@single')->name('single');
Route::get('/search','SearchController@search')->name('search');
Route::get('/category/rooms/{slug}','HomeController@categoryrooms')->name('categoryrooms');
Route::get('/booking/{id}', 'BookingController@index')->name('booking');

Route::get('/payment', 'BookingController@payment')->name('payment');
Route::post('/store/{id}', 'BookingController@store')->name('store');
Route::get('/show', 'BookingController@show')->name('show');

Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('facility','FacilityController');
    Route::resource('room','RoomController');
    Route::get('/reservations', 'ReservationController@index')->name('reservations');
    Route::get('/reservation/{id}/show', 'ReservationController@show')->name('reservation.show');

    Route::get('/reservation/{id}/update', 'ReservationController@update')->name('reservation.update');
    Route::post('/reservation/{id}/destroy', 'ReservationController@destroy')->name('reservation.destroy');
});

Route::group(['as' => 'client.', 'prefix' => 'client', 'namespace' => 'Guest', 'middleware' => ['auth', 'client']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/reservations', 'ReservationController@index')->name('reservations');
    Route::get('/reservation/{id}/edit', 'ReservationController@edit')->name('reservation.edit');
    Route::post('/reservation/{id}/updaterequest', 'ReservationController@updaterequest')->name('reservation.updaterequest');
    Route::delete('/reservation/{id}/delete', 'ReservationController@destroy')->name('reservation.destroy');
});
