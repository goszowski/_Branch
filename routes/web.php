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

Auth::routes(['verify' => true]);

Route::group(['middleware'=>['auth', 'web', 'verified']], function() {
    Route::get('/', 'FeedController@index')->name('feed');
    Route::get('/post/{post}', 'PostController@show')->name('post');
    Route::post('/post', 'PostController@store')->name('post.store');
    Route::get('/{user}', 'ProfileController@show')->name('profile');
});
