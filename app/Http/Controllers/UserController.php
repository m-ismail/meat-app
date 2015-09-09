<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;

class UserController extends Controller {

	public function getOrders($device_id){

        $user = User::where('device_id', $device_id)->first();
        if($user){
            return response()->json([
                'data' => $user->orders,
                'status' => 200
            ], 200);
        }

        return response()->json([
            'message' => '???????? ??? ?????',
            'status' => 404
        ], 404);

    }

}
