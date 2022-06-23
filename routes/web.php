<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/','HomeController@index')->name('home');
Route::get('/room','HomeController@room')->name('room');
Route::get('/restaurant','HomeController@restaurant')->name('restaurant');
Route::get('/about','HomeController@about')->name('about');
Route::get('/contact','HomeController@contact')->name('contact');

Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('facility','FacilityController');
    Route::resource('room','RoomController');
});

Route::group(['as' => 'client.', 'prefix' => 'client', 'namespace' => 'Guest', 'middleware' => ['auth', 'client']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
