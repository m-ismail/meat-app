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
    // user
    Route::get('/', 'dashboard\UserController@getLogin');
    Route::post('/', 'dashboard\UserController@postLogin');
    // home
    Route::get('/home', 'dashboard\HomeController@index');
    // order
    Route::resource('orders', 'dashboard\OrderController');
    Route::get('orders/{id}/{status}', 'dashboard\OrderController@updateStatus');
    // types
    Route::resource('types', 'dashboard\AnimalTypeController');
    Route::get('types/delete/{id}', 'dashboard\AnimalTypeController@delete');
    // methods
    Route::resource('methods', 'dashboard\CuttingMethodController');
    Route::get('methods/delete/{id}', 'dashboard\CuttingMethodController@delete');
    // centers
    Route::resource('centers', 'dashboard\DistributionCenterController');
    Route::get('centers/delete/{id}', 'dashboard\DistributionCenterController@delete');
});


// API
Route::group(['prefix'=>'api/v1.0'], function(){
    // user
    Route::get('users/{mobile}', 'api\v1\UserController@getOrders');
    // home
    Route::get('start', 'api\v1\HomeController@index');
    // order
    Route::resource('orders', 'api\v1\OrderController');
});