<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');



Route::get('/', function () {
    return view('layouts.website');
});
Route::get('/home', function () {
    return view('layouts.website');
});

Route::group(['middleware' => 'auth', 'prefix'=>'admin'], function(){

	Route::get('/', ['as'=>'admin.index', 'uses'=>'HomeController@dashboard']);

	/**
	 * ===========================================================
	 * Contacts
	 */
	
	Route::post('contacts/image/{id}', ['as'=>'admin.contacts.image', 'uses'=>'DriversController@postImage']);
	Route::bind('contacts', function($id){
		return App\Contact::
			whereUserId(auth()->user()->id)
			->findOrFail($id);
	});

	Route::resource('contacts', 'ContactsController', []);

	/**
	 * Drivers
	 */
	Route::get('drivers/birthdays', ['as'=>'admin.drivers.birthdays', 'uses'=>'DriversController@birthdays']);
	Route::get('drivers/search', ['as'=>'admin.drivers.search', 'uses'=>'DriversController@search']);
	Route::post('drivers/image/{id}', ['as'=>'admin.drivers.image', 'uses'=>'DriversController@postImage']);

	Route::bind('drivers', function($id){
		return \App\Driver::findOrFail($id);
	});


	Route::resource('drivers', 'DriversController');

	/**
	 * Todos
	 */

	Route::get('todos/completar/{id}', ['as'=>'admin.todos.completar', 'uses'=>'TodosController@completar']);
	Route::get('todos/incompletar/{id}', ['as'=>'admin.todos.incompletar', 'uses'=>'TodosController@incompletar']);
	
	Route::bind("todos", function($id){
		return \App\Todo::whereUserId(Auth::user()->id)->findOrFail($id);
	});
	
	Route::resource('todos', 'TodosController', []);

});
