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

// Dashboard
Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/', 'dashboard\HomeController@index');
    Route::resource('orders', 'dashboard\OrderController');
});


// API
Route::group(['prefix'=>'api/v1.0'], function(){
    Route::get('users/{mobile}', 'api\v1\UserController@getOrders');
    Route::get('start', 'api\v1\HomeController@index');
    Route::resource('orders', 'api\v1\OrderController');
});