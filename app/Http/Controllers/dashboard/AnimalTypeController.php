<?php namespace App\Http\Controllers\dashboard;

use App\AnimalType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return AnimalType::all();
    }


    public function delete($id)
    {
        AnimalType::find($id)->delete();
        return 'deleted';
    }

    public function store(Request $request){
        if( $request->has('id') ){
            AnimalType::find($request->input('id'))->update($request->except('id'));
            return 'updated';
        }
        AnimalType::create($request->all());
        return 'saved';
    }

}
