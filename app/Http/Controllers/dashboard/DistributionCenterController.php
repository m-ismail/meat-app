<?php namespace App\Http\Controllers\dashboard;

use App\DistributionCenter;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistributionCenterController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return DistributionCenter::all();
    }


    public function delete($id)
    {
        DistributionCenter::find($id)->delete();
        return 'deleted';
    }

    public function store(Request $request){
        if( $request->has('id') ){
            DistributionCenter::find($request->input('id'))->update($request->except('id'));
            return 'updated';
        }
        DistributionCenter::create($request->all());
        return 'saved';
    }

}
