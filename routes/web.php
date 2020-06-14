<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'TweetsController@index')->name('home');
Route::get('/home', 'TweetsController@index')->name('home');
Route::get('/tweets', 'TweetsController@index')->name('tweets');
Route::post('/tweets', 'TweetsController@store');
Route::get('/tweets/create', 'TweetsController@create')->name('tweets.create');
Route::get('/tweets/{tweets}', 'TweetsController@show')->name('tweets.show');
Route::post('/comments', 'CommentsController@store');