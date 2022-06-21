<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
});

Route::group(['as' => 'client.', 'prefix' => 'client', 'namespace' => 'Guest', 'middleware' => ['auth', 'client']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
