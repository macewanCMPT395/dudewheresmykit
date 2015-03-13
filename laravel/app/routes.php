<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
//sessions is assumed folder that all session related views are in i.e login form
Route::resource('sessions', 'SessionsController');

Route::get('/', function()
{
	return View::make('hello');
});
