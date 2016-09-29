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
}
