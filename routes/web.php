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


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/categories/list', function () {
    return view('categories.list');
})->name('categories.list');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('users')->group(function () {
    Route::get('{id}/profile', 'UserController@profile')->name('users.profile');
    Route::post('{id}/profile', 'UserController@update')->name('users.update');
    Route::post('{id}/profileImage', 'UserController@updateImage')->name('users.updateImage');
    Route::post('{id}/change-password', 'UserController@updatePassword')->name('users.updatePassword');
});
