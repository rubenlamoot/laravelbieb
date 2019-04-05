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
Route::get('/result', 'FrontController@search');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'active'], function () {
    Route::get('/home','HomeController@index');
    Route::get('/admin/rentals/user', 'AdminRentalsController@user')->name('rentals.user');
    Route::get('/admin/rentals/user_late', 'AdminRentalsController@user_late')->name('rentals.user_late');
    Route::post('/admin/rentals/user','AdminRentalsController@user_rent');
    Route::patch('/admin/rentals/user','AdminRentalsController@user_rent_back');
//    Route::get('/admin/books/result', 'FrontController@search')->name('books.result');
    Route::get('/admin/books/book_detail/{id?}', 'AdminBooksController@book_detail')->name('books.book_detail');

    Route::get('/admin/books/search', function (){
        return view('admin.books.search');
    })->name('books.search');

    Route::resource('/users', 'UsersController');

});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','HomeController@index');
    Route::get('/admin/rentals/open', 'AdminRentalsController@open')->name('rentals.open');
    Route::get('/admin/rentals/late', 'AdminRentalsController@late')->name('rentals.late');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/books', 'AdminBooksController');
    Route::resource('/admin/authors', 'AdminAuthorsController');
    Route::resource('/admin/rentals', 'AdminRentalsController');
});
