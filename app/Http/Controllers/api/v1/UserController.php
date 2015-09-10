<?php namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;

class UserController extends Controller {

	public function getOrders($device_id){

        $user = User::where('device_id', $device_id)->first();
        if($user){
            return response()->json([
                'data' => $user->orders()->with('animalType', 'cuttingMethod', 'distCenter', 'user')->get(),
                'status' => 200
            ], 200);
        }

        return response()->json([
            'message' => '???????? ??? ?????',
            'status' => 404
        ], 404);

    }

}
