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

Route::get('/','PostController@index')->name('posts.index');
Route::get('search','PostController@index')->name('search');
Route::get('posts/create','PostController@create')->name('posts.create');
Route::get('posts/{id}','PostController@show')->name('posts.show');
Route::post('posts/store','PostController@store')->name('posts.store');
