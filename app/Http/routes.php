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

Route::get('qurban', function(){
    $types = \App\AnimalType::all();
    $methods = \App\CuttingMethod::all();
    $centers = \App\DistributionCenter::all();
    return view('index', compact('types', 'methods', 'centers'));
});

Route::post('qurban', function(\Illuminate\Http\Request $request){
    $v = Validator::make($request->all(), [
        'name' => 'required',
        'mobile' => 'required',
    ]);

    if ($v->fails()) {
        return redirect('/qurban')->with('error', 'Please enter your name and mobile');
    }

    // if user not exists, create it
    $user = \App\User::where('mobile', $request->input('mobile'))->first();
    if (!$user) {
        $user = \App\User::create([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('mobile'),
        ]);
    }

    // calc order amount
    $type = \App\AnimalType::find($request->input('type'));
    $cut = \App\CuttingMethod::find($request->input('cut'));
    $amount = $type->price + $cut->fees;

    // create order
    $order = \App\Order::create([
        'status' => \App\Order::STATUS_NEW,
        'book_time' => '',
        'type_id' => $request->input('type'),
        'method_id' => $request->input('cut'),
        'center_id' => $request->input('center'),
        'user_id' => $user->id,
        'amount' => $amount,
    ]);

    if ($order) {
        return redirect('/qurban')->with('order', $order);
    }
});

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