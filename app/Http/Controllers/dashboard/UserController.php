<?php namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller {

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect()->intended('/dashboard/home');
        }

        return redirect('/dashboard')
            ->withInput($request->only('name', 'remember'))
            ->withErrors([
                'name' => 'These credentials do not match our records.',
            ]);
    }

	public function getOrders($mobile){

        $user = User::where('mobile', $mobile)->first();
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
