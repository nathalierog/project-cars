<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\car;
use DB;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $cars = car::with(array('images' => function($query){
            $query->orderBy('priority');
        }))
        ->leftJoin('car_brands', 'car_brands.id', '=', 'cars.brand_id')
        ->leftJoin('car_models', 'car_models.id', '=', 'cars.model_id')
        ->select('*', 'cars.id as carid')
        ->where(function($query) use ($request) {
            if(($term = $request->get('term'))) {
                $query->where('brand', 'LIKE', '%'. $term . '%')
                ->orWhere("model", "LIKE", '%'. $term . '%')
                ->orWhere(DB::raw("CONCAT(`brand`, ' ', `model`)"), 'LIKE', "%".$term."%")
                ->orWhere(DB::raw("CONCAT(`model`, ' ', `brand`)"), 'LIKE', "%".$term."%")
                ->orWhere("keyword", "LIKE", '%'. $term . '%');
                if(ctype_digit($term)) {
                    $query->orWhere("price", "<=", $term)
                    ->orWhere("year", "LIKE", '%'. $term . '%');
                }
            }
        })
        ->where("cars.sold", "LIKE", 0)
        ->orderBy('cars.created_at', 'desc')
        ->paginate(15);

        return view('cars.overview', ['cars' => $cars, 'input' => $request->all()]);
    }

    public function show($id)
    {
        $car = car::with(array('images' => function($query){
            $query->orderBy('priority');
        }))->find($id);

        function multiexplode ($delimiters,$string) {
            $ready = str_replace($delimiters, $delimiters[0], $string);
            $launch = explode($delimiters[0], $ready);
            return  $launch;
        }

        $accessories = $car['accessories'];
        $accessories = multiexplode(array(",",", "," ,"," , "),$accessories);

        $keywords = $car['keyword'];
        $keywords = multiexplode(array(",",", "," ,"," , "),$keywords);

        return view('cars.details', ['car' => $car, 'accessories' => $accessories, 'keywords' => $keywords]);
    }

}
