<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\car;
use DB;

class SearchController extends Controller
{
	public function getSearchValues() {
		// $brands = car::orderBy('brand', 'asc')->get()->values('brand');

    	// return view('search', ['brands' => $brands]);
   	}

   	public function getModels(Request $request) {
   		
   	}
}
