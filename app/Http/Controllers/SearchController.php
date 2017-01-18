<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\carBrands;
use App\carModels;
use DB;

class SearchController extends Controller
{
	public function getSearchValues() {
		$brands = carBrands::orderBy('brand', 'asc')->get();

    	return view('search', ['brands' => $brands]);
   	}

   	public function getModels()
    {
        $brandID = $_GET['brandID'];
        $carModels = CarModels::where('brand_id', $brandID)->get();

        return response()->json($carModels);
    }
}
