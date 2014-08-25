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


//Route::get('login', 'LoginController@getIndex');
Route::group(array('before' => 'auth'), function(){
	Route::controller('customer', 'CustomerController');
	Route::get('logout', 'LoginController@getLogout');
});
Route::post('/login/check', 'LoginController@postCheck');
Route::group(array('before' => 'guest'), function(){
	Route::get('login', 'LoginController@getIndex');
});

Route::get('clearcache', 'LoginController@getClearcache');

Route::controller('/', 'IndexController');
