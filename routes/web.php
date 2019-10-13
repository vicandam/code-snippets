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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('topic', 'TopicController');
Route::resource('developer', 'DeveloperController');
Route::resource('blog', 'BlogController');

Route::get('/topic-my-posts', 'TopicController@userPost');

Route::name('api.')->prefix('api')->group(function () {
    Route::resource('topic', 'Api\TopicController');
    Route::resource('category', 'Api\CategoryController');

    Route::get('user-post', 'Api\TopicController@showUserPost')->name('user.post');
});
