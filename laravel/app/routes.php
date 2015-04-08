<?php
Route::group(['before' => 'auth'], function() {
	Route::get('/', 'HomeController@home');
	Route::resource('booking','BookingsController');
	Route::get('types/{id}/destroy','KitTypesController@destroy');
	Route::resource('types','KitTypesController');
	Route::get('summary','SummaryController@index');
	Route::get("/items/create/{id}", 'ItemsController@create');
	Route::post("/items/store/{id}", 'ItemsController@store');
	Route::get("/items/report/{id}", 'ItemsController@report');
	Route::post("/items/update/{id}", 'ItemsController@update');
	Route::get("/items/edit/{id}", 'ItemsController@edit');
	Route::get("/items/destroy/{id}", 'ItemsController@destroy');

	Route::get('/kits/destroy/{id}','KitsController@destroy');
	Route::get('/kits/edit/{id}','KitsController@edit');
	Route::get('/kits/report/{id}','KitsController@report');
	Route::get('/kits/show/{id}','KitsController@show');
	Route::post('/kits/update/{id}','KitsController@update');
	Route::post('/kits/store', 'KitsController@store');
	Route::get('/kits/create', 'KitsController@create');
	Route::get('/kits/{id}','KitsController@type');
	Route::get('/kits','KitsController@index');

	Route::get('/transfers', 'TransferController@index');
	Route::get('/transfers/ship/{id}', 'TransferController@ship');
	Route::get('/transfers/receive/{id}', 'TransferController@receive');
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
