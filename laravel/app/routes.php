<?php
Route::group(['before' => 'auth'], function() {
	Route::get('/', function() {
		return View::make('hello');
	});
    Route::resource('booking','BookingsController');
    Route::resource('summary','SummaryController');
});

Route::get('/login', function() {
	return View::make('login')->with(array('title' => 'Log In'));
});

Route::post('/login', function() {
	$cred = array(
		'email' => strtolower(Input::get('email')),
		'password' => Input::get('password')
	);

	if(Auth::attempt($cred)) return Redirect::intended('/');
	else Session::flash("badlogin", true);
	return Redirect::to('/login');
});

Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to('/login');
});
