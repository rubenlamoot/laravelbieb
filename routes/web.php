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

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home','HomeController@index');
    Route::resource('/users', 'UsersController');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','HomeController@index');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/books', 'AdminBooksController');
    Route::resource('/admin/authors', 'AdminAuthorsController');
    Route::resource('/admin/rentals', 'AdminRentalsController');

});
