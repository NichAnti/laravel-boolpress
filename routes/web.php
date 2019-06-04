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


Route::get('/', 'GeneralController@showFirstFive')->name('home');
Route::get('category/{category_name}', 'GeneralController@showCategoryPosts')->name('category-posts');
Route::get('post/{id}', 'GeneralController@showPost')->name('show-post');
Route::get('admin/post/new', 'HomeController@create')->name('create-post');
Route::post('admin/post/new', 'HomeController@store')->name('store-post');
Route::get('admin/post/edit/{id}', 'HomeController@edit')->name('edit-post');
Route::patch('admin/post/edit/{id}', 'HomeController@update')->name('update-post');
Route::delete('admin/post/delete/{id}', 'HomeController@destroy')->name('destroy-post');

Auth::routes();

Route::get('/searchPage', 'SearchController@searchPost')->name('search-post');
Route::get('/search', 'SearchController@displayResult')->name('display-searched');

Route::get('/contact', 'HomeController@mailPage')->name('mail-page');
Route::post('/contact', 'HomeController@sendMail')->name('send-mail');
