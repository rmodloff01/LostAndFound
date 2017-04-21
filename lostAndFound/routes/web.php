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

Route::get('/home', 'HomeController@index');

Route::get('/itemForm', 'ItemsController@showForm');

Route::get('/editForm', 'ItemsController@showEditForm');

Route::post('/editForm', 'ItemsController@editItem');

Route::post('/itemForm', 'ItemsController@addItem');
Route::post('/itemFilter', 'ItemsController@getSearchResults');


Route::get('/getUser', 'DeleteUserController@getUsers');

Route::delete('/delUser', 'DeleteUserController@deleteUser');
