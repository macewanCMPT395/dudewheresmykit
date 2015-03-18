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

//Route::resource('sessions', 'SessionController');
Route::get('/', 'SessionController@create');

Route::post('/', function() {

    $user = array(
    
        'Email' => Input::get('Email'),
        'password' => Input::get('Password'));

    if(Auth::attempt($user)) {
        return View::make('test');
    }

} );


