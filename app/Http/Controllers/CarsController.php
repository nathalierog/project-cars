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
        if ($request->get('brand')) {
            $brand = $request->get('brand');
            $model = $request->get('model');
            $priceFrom = $request->get('price-from');
            $priceFrom = str_replace(".", "", $priceFrom);
            $priceTo = $request->get('price-to');
            $priceTo = str_replace(".", "", $priceTo);
            $mileageFrom = $request->get('mileage-from');
            $mileageFrom = str_replace(".", "", $mileageFrom);
            $mileageTo = $request->get('mileage-to');
            $mileageTo = str_replace(".", "", $mileageTo);
            $yearFrom = $request->get('year-from');
            $yearTo = $request->get('year-to');
            $fuel = $request->get('fuel');
            $transmission = $request->get('transmission');
            $sort = $request->get('sort');

            $cars = car::with(array('images' => function($query){
                $query->orderBy('priority');
            }))
            ->leftJoin('car_brands', 'car_brands.id', '=', 'cars.brand_id')
            ->leftJoin('car_models', 'car_models.id', '=', 'cars.model_id')
            ->select('*', 'cars.id as carid')
            ->where(function($query) use ($brand, $model, $priceFrom, $priceTo, $mileageFrom, $mileageTo, $yearFrom, $yearTo, $fuel, $transmission) {
            // BRAND SELECT //
            if($brand != "---") {
                $query->where('car_brands.brand', 'LIKE', $brand);
            }
            // MODEL SELECT //
              if($model != "---") {
                $query->where('car_models.model', 'LIKE', $model);
              }
              // PRICE SELECT //
              if($priceFrom != "---" && $priceTo != "---") {
                if($priceFrom < $priceTo) {
                  $query->whereBetween('cars.price', [$priceFrom, $priceTo]);
                } else {
                  $query->whereBetween('cars.price', [$priceTo, $priceFrom]);
                }
              }
              if($priceFrom != "---" && $priceTo == "---") {
                $query->where('cars.price', '>=', $priceFrom);
              } else if($priceTo != "---" && $priceFrom == "---") {
                $query->where('cars.price', '<=', $priceTo);
              }
              // MILEAGE SELECT //
              if($mileageFrom != "---" && $mileageTo != "---") {
                if($mileageFrom < $mileageTo) {
                  $query->whereBetween('cars.mileage', [$mileageFrom, $mileageTo]);
                } else {
                  $query->whereBetween('cars.mileage', [$mileageTo, $mileageFrom]);
                }
              }
              if($mileageFrom != "---" && $mileageTo == "---") {
                $query->where('cars.mileage', '>=', $mileageFrom);
              } else if($mileageTo != "---" && $mileageFrom == "---") {
                $query->where('cars.mileage', '<=', $mileageTo);
              }
              // YEAR SELECT //
              if($yearFrom != "---" && $yearTo != "---") {
                if($yearFrom < $yearTo) {
                  $query->whereBetween('cars.year', [$yearFrom, $yearTo]);
                } else {
                  $query->whereBetween('cars.year', [$yearTo, $yearFrom]);
                }
              }
              if($yearFrom != "---" && $yearTo == "---") {
                $query->where('cars.year', '>=', $yearFrom);
              } else if($yearTo != "---" && $yearFrom == "---") {
                $query->where('cars.year', '<=', $yearTo);
              }
              // FUEL SELECT //
              if($fuel != "---") {
                $query->where('cars.fuel', 'LIKE', $fuel);
              }
              // FUEL SELECT //
              if($transmission != "---") {
                $query->where('cars.transmission', 'LIKE', $transmission);
              }
            })
            ->where("cars.sold", "LIKE", 0)
            ->orderBy('cars.created_at', 'desc')
            ->paginate(15);
            } else {
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
            }

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
            return $launch;
        }

        $accessories = $car['accessories'];
        $accessories = array_filter(multiexplode(array(",",", "," ,"," , "),$accessories));

        $keywords = $car['keyword'];
        $keywords = array_filter(multiexplode(array(",",", "," ,"," , "),$keywords));

        return view('cars.details', ['car' => $car, 'accessories' => $accessories, 'keywords' => $keywords]);
    }

}
