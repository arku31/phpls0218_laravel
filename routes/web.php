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
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => 'posts'], function () {
    Route::get('populate', 'PostController@populate');
    Route::get('/', 'PostController@index');
    Route::get('create', 'PostController@create')->name('posts_create');
    Route::post('store', 'PostController@store');
    Route::get('edit/{post_id}', 'PostController@edit');
    Route::post('update/{post_id}', 'PostController@update');
    Route::get('destroy/{post_id}', 'PostController@destroy');
});

//Route::resource('posts', 'PostController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
