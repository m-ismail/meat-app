<?php namespace App\Http\Controllers;

use App\AnimalType;
use App\CuttingMethod;
use App\Http\Requests;
use App\Order;
use App\User;
use Illuminate\Http\Request;

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
        // if user not exists, create it
        $user = User::where('mobile', $request->get('phone'))->first();
        if (!$user) {
            $user = User::create([
                'name' => $request->get('name'),
                'mobile' => $request->get('phone'),
                'email' => $request->get('phone'),
            ]);
        }

        // calc order amount
        $type = AnimalType::find($request->get('type'));
        $cut = CuttingMethod::find($request->get('cuts'));
        $amount = $type->price + $cut->fees;

        // create order
        $order = Order::create([
            'status' => Order::STATUS_NEW,
            'book_time' => '',
            'type_id' => $request->get('type'),
            'method_id' => $request->get('cuts'),
            'center_id' => $request->get('center'),
            'user_id' => $user->id,
            'amount' => $amount,
        ]);

        if($order){
            return response()->json([
                'data' => [
                    'order' => $order,
                ],
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
