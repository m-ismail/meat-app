<?php namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\AnimalType;
use App\CuttingMethod;
use App\Http\Requests;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($v->fails()) {
            return response()->json([
                'message' => '????? ???? ?????? ??????',
                'status' => 202
            ], 202);
        }

        // if user not exists, create it
        $user = User::where('mobile', $request->input('phone'))->first();
        if (!$user) {
            $user = User::create([
                'name' => $request->input('name'),
                'mobile' => $request->input('phone'),
                'email' => $request->input('phone'),
                'device_id' => $request->input('device_id', '111222333'),
            ]);
        }

        // calc order amount
        $type = AnimalType::find($request->input('type'));
        $cut = CuttingMethod::find($request->input('cuts'));
        $amount = $type->price + $cut->fees;

        // create order
        $order = Order::create([
            'status' => Order::STATUS_NEW,
            'book_time' => '',
            'type_id' => $request->input('type'),
            'method_id' => $request->input('cuts'),
            'center_id' => $request->input('center'),
            'user_id' => $user->id,
            'amount' => $amount,
        ]);

        if ($order) {
            return response()->json([
                'data' => $order,
                'status' => 200
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
