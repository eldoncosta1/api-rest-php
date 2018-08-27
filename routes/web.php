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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('docs', function() {
	return view('api.docs.index');
});


/* /api/user/ */

Route::group(['prefix' => 'api'], function() {

	Route::group(['prefix' => 'user'], function() {
		Route::get('', ['uses' => 'UserController@allUsers']);

		Route::get('{id}', ['uses' => 'UserController@getUser']);

		Route::post('', ['uses' => 'UserController@saveUser']);

		Route::put('{id}', ['uses' => 'UserController@updateUser']);

		Route::delete('{id}', ['uses' => 'UserController@deleteUser']);
	});
});