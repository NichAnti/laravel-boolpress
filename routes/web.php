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

Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');

// Route::get('/', 'PostController');
// Route::get('categories', 'CategoryController');

Route::get('/searchPage', 'SearchController@searchPost')->name('search-post');
Route::get('/search', 'SearchController@displayResult')->name('display-searched');
