<?php namespace App\Http\Controllers;

use App\AnimalType;
use App\CuttingMethod;
use App\DistributionCenter;

class HomeController extends Controller {


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

		return response()->json(['data' => [
			'types' => $types,
			'methods' => $methods,
			'centers' => $centers,],
			'code' => 200
		], 200);
	}

}
