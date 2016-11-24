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
Route::post('react_car', 'ContactController@reactForm');

Route::get('about', function(){
	return view('about-us');
});

Route::get('search', function(){
	return view('search');
});

Route::auth();

Route::group(['prefix' => 'backpanel', 'middleware' => 'isBoth'], function () {
	Route::get('/', function () {
		return view('backpanel.overview');
	});
	Route::get('imgorder/{id}', 'AdminController@imgOrderView');
	Route::post('imgorder', 'AdminController@imgOrderAction');
	Route::post('imgdelete', 'AdminController@deleteImages');
	Route::post('addImage/{id}','AdminController@addImage');
	Route::get('overview', function () {
		return redirect('backpanel');
	});
	Route::get('sales', 'AdminController@getSales');
	Route::get('cars', 'AdminController@cars');
	Route::get('addcar', function () {
		return view('backpanel.addcar');
	});
	Route::get('editcar/{id}', 'AdminController@editcarform');
	Route::post('editcar/{id}', 'AdminController@editCar');
	Route::post('deletecar/{id}', 'AdminController@deleteCar');
	Route::post('addcar','AdminController@setCar');
});

Route::group(['prefix' => 'cars'], function ()
{
	Route::get('/', 'CarsController@index');	
	Route::get('details/{id}', 'CarsController@show');	
});


