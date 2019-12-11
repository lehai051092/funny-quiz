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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('users')->group(function () {
    Route::get('{id}/profile', 'UserController@profile')->name('users.profile');
    Route::post('{id}/profile', 'UserController@update')->name('users.update');
    Route::get('{id}/change-password', 'UserController@changePassword')->name('users.changePassword');
    Route::get('{id}/change-password', 'UserController@updatePassword')->name('users.updatePassword');
});
