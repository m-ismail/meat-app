<?php namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\AnimalType;
use App\CuttingMethod;
use App\DistributionCenter;

class HomeController extends Controller
{


    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $types = AnimalType::all();
        $methods = CuttingMethod::all();
        $centers = DistributionCenter::all();

        return response()->json([
            'data' => [
                'types' => $types,
                'methods' => $methods,
                'centers' => $centers,
            ],
            'status' => 200
        ], 200);
    }

}
