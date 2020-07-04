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
Route::get('/feed/{postId?}', 'PostsController@index');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('user', 'UsersController');

Route::get('/', 'TweetsController@index')->name('home');
Route::get('/home', 'TweetsController@index')->name('home');
// Route::get('/tweets', 'TweetsController@index')->name('tweets');
// Route::post('/tweets', 'TweetsController@store');
// Route::get('/tweets/create', 'TweetsController@create')->name('tweets.create');
// Route::get('/tweets/{tweets}', 'TweetsController@show')->name('tweets.show');
// Route::get('/tweets/{tweets}/edit', 'TweetsController@edit')->name('tweets.edit');
// Route::put('/tweets/{tweets}', 'TweetsController@update');
// Route::delete('/tweets/{tweets}', 'TweetsController@destroy')->name('tweets.destroy');

Route::resource('tweet', 'TweetsController');


Route::post('/comments', 'CommentsController@store');
Route::post('/reply', 'CommentsController@replyStore')->name('reply.add');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.update');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/profile','UsersController@show')->name('profile.show');
Route::post('/profile','UsersController@update');
Route::get('/profile/edit','UsersController@edit')->name('profile.edit');

Route::get('storage/{filename}', function($filename){
    $path = storage_path('images/'.$filename);

    if(!File::exists($path)){
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type",$type);

    return $response;
})->name('storage');