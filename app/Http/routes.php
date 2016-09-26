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

Route::get('/', function () {
    return view('home');
});

Route::get('contact', function(){
	return view('contact');
});

Route::post('contact_request','ContactController@getContactForm');

Route::get('about', function(){
	return view('about-us');
});

Route::auth();

Route::group(['prefix' => 'backpanel'], function () {
	Route::get('overview', function () {
		return view('backpanel.overview');
	});
	Route::get('cars', function () {
		return view('backpanel.cars');
	});
	Route::get('addcar', function () {
		return view('backpanel.addcar');
	});
	Route::get('editcar', function () {
		return view('backpanel.editcar');
	});
	Route::get('deletecar', function () {
		return view('backpanel.deletecar');
	});
});


