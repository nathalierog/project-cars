<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\carBrands;
use App\carModels;
use DB;

class SearchController extends Controller
{
	public function getSearchValues()
	{
		$brands = carBrands::orderBy('brand', 'asc')->get();

		$prices = array('250', '500', '750', '1.000', '1.250', '1.500', '2.000', '2.500', '3.000', '4.000', '5.000', '6.000', '7.000', '8.000', '9.000', '10.000', '12.500', '15.000', '17.500', '20.000', '22.500', '25.000');
		$mileage = array('5.000', '10.000', '15.000', '20.000', '40.000', '60.000', '80.000', '100.000', '120.000', '140.000', '160.000', '180.000', '200.000', '250.000', '500.000');

    	return view('search', ['brands' => $brands, 'prices' => $prices, 'mileage' => $mileage]);
   	}

   	public function getModels()
    {
        $brandID = $_GET['brandID'];
        $carModels = CarModels::where('brand_id', $brandID)->get();

        return response()->json($carModels);
    }

}
