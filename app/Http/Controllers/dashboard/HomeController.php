<?php namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

}
