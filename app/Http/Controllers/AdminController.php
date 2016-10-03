<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\car;

class AdminController extends Controller
{
    public function cars()
    {
    	$cars = car::all();
        return view('backpanel.cars', ['cars' => $cars]);
    }

    public function setCar(Request $request)
    {	
    	$this->validate($request, [
    		'brand' => 'Required',
    		'model' => 'Required',
    		'keyword' => '',
    		'price' => 'Required',
    		'mileage' => 'Required',
    		'year' => 'Required',
    		'color' => 'Required',
    		'transmission' => 'Required',
    		'body' => 'Required',
    		'fuel' => 'Required',
    		'license_plate' => 'Required',
    		'main_img' => '',
    		'description' => 'Required',
    		]);
    	car::create($request->all());
    	return redirect('backpanel/cars');
    }

    public function deleteCar($id)
    {
    	car::destroy($id);
    	return redirect('backpanel/cars');
    }
}
