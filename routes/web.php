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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoryController@getAll')->name('categories.list');
    Route::get('create', 'CategoryController@create')->name('categories.create');
    Route::post('create', 'CategoryController@store')->name('categories.store');
    Route::get('{id}/delete', 'CategoryController@delete')->name('categories.delete');
});

Route::prefix('tests')->group(function () {
    Route::get('{id?}/', 'TestController@TestsInCategory')->name('tests.list');
    Route::get('{id}/create', 'TestController@create')->name('tests.create');
    Route::post('{id}/create', 'TestController@store')->name('tests.store');
    Route::get('{id}/delete', 'TestController@delete')->name('tests.delete');
    Route::get('{id}/edit', 'TestController@edit')->name('tests.edit');
    Route::post('{id}/update', 'TestController@update')->name('tests.update');
});

Route::prefix('quizzes')->group(function () {
    Route::get('{id}/', 'QuizController@QuizzesInTest')->name('quizzes.list');
    Route::get('{id}/create', 'QuizController@create')->name('quizzes.create');
    Route::post('{id}/create', 'QuizController@store')->name('quizzes.store');
    Route::get('{id}/delete', 'QuizController@delete')->name('quizzes.delete');
    Route::get('{id}/edit', 'QuizController@edit')->name('quizzes.edit');
    Route::post('{id}/edit', 'QuizController@update')->name('quizzes.update');
});

Route::prefix('questions')->group(function () {
    Route::get('{id}/', 'QuestionController@questionsInQuiz')->name('questions.list');
    Route::get('{id}/create', 'QuestionController@create')->name('questions.create');
    Route::post('{id}/create', 'QuestionController@store')->name('questions.store');
    Route::get('{id}/delete', 'QuestionController@delete')->name('questions.delete');
    Route::get('{id}/edit', 'QuestionController@edit')->name('questions.edit');
    Route::post('{id}/edit', 'QuestionController@update')->name('questions.update');
});

Route::prefix('answers')->group(function () {
    Route::get('{id}/create', 'AnswerController@create')->name('answers.create');
    Route::post('{id}/create', 'AnswerController@store')->name('answers.store');
    Route::get('{id}/delete', 'AnswerController@delete')->name('answers.delete');
    Route::get('{id}/edit', 'AnswerController@edit')->name('answers.edit');
    Route::post('{id}/edit', 'AnswerController@update')->name('answers.update');
});

Route::prefix('users')->group(function () {
    Route::get('{id}/profile', 'UserController@profile')->name('users.profile');
    Route::post('{id}/profile', 'UserController@update')->name('users.update');
    Route::post('{id}/profileImage', 'UserController@updateImage')->name('users.updateImage');
    Route::post('{id}/change-password', 'UserController@updatePassword')->name('users.updatePassword');
    Route::get('list', 'UserController@getAll')->name('users.list');
});
