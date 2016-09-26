<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cars = car::all();
        return view('cars.overview', ['cars' => $cars]);
    }

    public function show($id)
    {
        $car = car::find($id);
        return view('cars.details', ['car' => $car]);
    }

}
