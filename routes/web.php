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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoryController@getAll')->name('categories.list');
    Route::get('create', 'CategoryController@create')->name('categories.create');
    Route::post('create', 'CategoryController@store')->name('categories.store');
    Route::get('{id}/delete', 'CategoryController@delete')->name('categories.delete');
});

Route::prefix('tests')->group(function (){
   Route::get('{id?}/','TestController@TestsInCategory')->name('tests.list');
   Route::get('{id}/create','TestController@create')->name('tests.create');
   Route::post('{id}/create','TestController@store')->name('tests.store');
   Route::get('{id}/delete','TestController@delete')->name('tests.delete');
   Route::get('{id}/edit','TestController@edit')->name('tests.edit');
   Route::post('{id}/update','TestController@update')->name('tests.update');
});

Route::prefix('quizzes')->group(function (){
    Route::get('{id}/','QuizController@QuizzesInTest')->name('quizzes.list');
    Route::get('{id}/create','QuizController@create')->name('quizzes.create');
    Route::post('{id}/create','QuizController@store')->name('quizzes.store');
    Route::get('{id}/delete','QuizController@delete')->name('quizzes.delete');
    Route::get('{id}/edit','QuizController@edit')->name('quizzes.edit');
    Route::post('{id}/edit','QuizController@update')->name('quizzes.update');
});
