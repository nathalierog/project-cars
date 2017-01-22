<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\carBrands;
use App\car;
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

    public function countResults(Request $request)
    {
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

      $cars = car::leftJoin('car_brands', 'car_brands.id', '=', 'cars.brand_id')
        ->leftJoin('car_models', 'car_models.id', '=', 'cars.model_id')
        ->select(DB::raw('count(*) as car_count'))
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
        ->get();

        return response()->json($cars);
    }

}
