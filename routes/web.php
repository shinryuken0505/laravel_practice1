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

Route::get('index', 'UserController@login')->name('index');
Route::get('user', 'UserController@index')->name('index');
Route::get('user/add', 'UserController@create');
Route::post('user/store', 'UserController@store');

Route::get('user/edit/{id}', 'UserController@edit')->where('id', '[0-9]+');
Route::post('user/update/{id}', 'UserController@update')->where('id', '[0-9]+');
Route::get('user/{id}', 'UserController@show')->where('id', '[0-9]+');


Route::get('user/login', 'UserController@login_form')->name('login');
Route::post('user/login', 'UserController@login');

Route::get('user/logout', 'UserController@logout')->name('logout');


Route::get('post', 'PostController@index');
Route::get('post/index', 'PostController@index');
Route::get('post/add', 'PostController@create');
Route::post('post/store', 'PostController@store')->middleware('checklogin');

Route::get('post/edit/{id}', 'PostController@edit')->where('id', '[0-9]+');
Route::post('post/update/{id}', 'PostController@update')->where('id', '[0-9]+');
Route::get('post/{id}', 'PostController@show')->where('id', '[0-9]+');
Route::get('post/delete/{id}', 'PostController@destroy')->middleware('checklogin')->where('id', '[0-9]+');
/*
Route::resource('user', 'PhotoController')->only([
    'index', 'show'
]);

Route::resource(user', 'PhotoController')->except([
    'create', 'store', 'update', 'destroy'
]);
*/