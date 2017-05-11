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

Route::get('/itemForm', 'ItemsController@showCreateForm');
Route::post('/itemForm', 'ItemsController@addItem');

Route::post('/editOrChanges', 'ItemsController@showEditOrChangesForm');
Route::post('/editForm', 'ItemsController@editItem');

Route::post('/collectedItemFilter', 'ItemsController@filterCollectedResults');
Route::post('/itemFilter', 'ItemsController@filterLostResults');

Route::get('/collectedItems', 'ItemsController@showCollectedItems');

Route::get('/getUser', 'DeleteUserController@getUsers');

Route::delete('/delUser', 'DeleteUserController@deleteUser');
