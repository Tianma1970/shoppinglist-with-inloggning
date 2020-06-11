<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shoppinglists/create', 'ShoppinglistController@create');
Route::post('/shoppinglist/store', 'ShoppinglistController@store');
Route::post('/shoppinglist/delete', 'ShoppinglistController@deleteMany');
Route::get('/shoppinglists/{shoppinglist}/show', 'ShoppinglistController@show');


/**
 * Routes for Shoppingitems
 */
Route::get('/shoppingitems/create', 'ShoppingitemController@create');
Route::post('/shoppingitems/store', 'ShoppingitemController@store');
Route::post('/shoppingitems/delete', 'ShoppingitemController@deleteMany');
Route::get('/shoppingitems/{shoppingitem}/edit', 'ShoppingitemController@edit');
Route::put('/shoppingitem/{shoppingitem}/update', 'ShoppingitemController@update');
