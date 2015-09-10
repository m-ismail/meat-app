<?php namespace App\Http\Controllers\dashboard;

use App\CuttingMethod;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuttingMethodController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return CuttingMethod::all();
    }


    public function delete($id)
    {
        CuttingMethod::find($id)->delete();
        return 'deleted';
    }

    public function store(Request $request){
        if( $request->has('id') ){
            CuttingMethod::find($request->input('id'))->update($request->except('id'));
            return 'updated';
        }
        CuttingMethod::create($request->all());
        return 'saved';
    }

}
