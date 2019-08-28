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
    return view('public/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //Category
    Route::post('/category/save', 'CategoryController@save')->name('category.save');
    Route::get('/category', 'CategoryController@all')->name('category');
    Route::delete('/category/many/{ids}', 'CategoryController@selectIds')->name('category.select.many');
    Route::get('/category/{id}', 'CategoryController@get')->name('category.show');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');

    //Post
    Route::get('/post', 'PostController@all')->name('post');
    Route::post('/post/save', 'PostController@save')->name('post.save');
    Route::delete('/post/delete/{id}', 'PostController@delete')->name('post.delete');
    Route::get('/post/{id}', 'PostController@get')->name('post.show');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
});

Route::get('/blog', 'BlogController@all')->name('blog');
Route::get('/blog/{id}', 'BlogController@postById')->name('blog.show');
Route::get('/blog/categories', 'BlogController@allCategory')->name('blog.categories');
Route::get('/blog/category/{id}', 'BlogController@allPostByCatId')->name('blog.category.show');
Route::get('/blog/search', 'BlogController@search')->name('blog.search');
Route::get('/blog/latest', 'BlogController@latest')->name('blog.latest');
