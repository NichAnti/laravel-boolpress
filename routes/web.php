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


Route::get('/', 'HomeController@showFirstFive')->name('home');
Route::get('category/{category_name}', 'HomeController@showCategoryPosts')->name('category-posts');
Route::get('post/{id}', 'HomeController@showPost')->name('show-post');
Route::get('admin/post/new', 'AdminController@create')->name('create-post');
Route::post('admin/post/new', 'AdminController@store')->name('store-post');
Route::get('admin/post/edit/{id}', 'AdminController@edit')->name('edit-post');
Route::patch('admin/post/edit/{id}', 'AdminController@update')->name('update-post');
Route::delete('admin/post/delete/{id}', 'AdminController@destroy')->name('destroy-post');


Route::get('/searchPage', 'SearchController@searchPost')->name('search-post');
Route::get('/search', 'SearchController@displayResult')->name('display-searched');
