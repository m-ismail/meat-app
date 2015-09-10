<?php namespace App\Http\Controllers\dashboard;

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
        return Order::with('animalType', 'cuttingMethod', 'distCenter', 'user')->get();
    }

    public function updateStatus($id, $status){
        $order = Order::find($id)->update([
            'status' => $status
        ]);
        if($order){
            return 'updated';
        }
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
