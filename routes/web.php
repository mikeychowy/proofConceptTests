<?php

use App\Http\Controllers\BookController;

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
    Route::resource('books', 'BookController');
    Route::resource('authors', 'AuthorController');
});

Route::get('/', function () {
    return view('welcome');
});
