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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'HomeController@logout')->name('logout');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/token', 'ApiTokenController@show');
    Route::post('/token', 'ApiTokenController@create');
    Route::group(['middleware' => 'permission:view users'], function () {
        Route::resource('users', 'UserController');
    });
    Route::get('/{category}', 'CategoryController@index')->middleware('permission:view');
    Route::get('/{category}/create', 'CategoryController@create')->middleware('permission:create');
    Route::post('/{category}', 'CategoryController@store')->middleware('permission:create');
    Route::get('/{category}/{id}/edit', 'CategoryController@edit')->middleware('permission:edit');
    Route::put('/{category}/{id}', 'CategoryController@update')->middleware('permission:edit');
    Route::delete('/{category}/{id}', 'CategoryController@destroy')->middleware('permission:delete');
});