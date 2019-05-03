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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/user/{id}', function ($id){
//    return view('pages.about');
    return "User id ". $id;
});


Route::resource("posts","PostsController");
Auth::routes();

Route::get('/dashboard', 'DashBoardController@index')->name('home');
