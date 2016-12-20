<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\car;
use App\CarBrands;
use App\CarModels;
use App\image;
use DB;
use Log;

class AdminController extends Controller
{	
    public function addsliderule(){

    }
	private function validator($request)
	{
		$this->validate($request, [
    		'brand_id' => 'Required',
    		'model_id' => 'Required',
    		'keyword' => '',
    		'price' => 'Required',
    		'mileage' => 'Required',
    		'year' => 'Required',
    		'color' => 'Required',
    		'transmission' => 'Required',
    		'body' => 'Required',
    		'fuel' => 'Required',
    		'main_img' => '',
    		'description' => 'Required',
            'img_uploads.*' => 'image|max:3000'
    		]);
	}
    private function storeImages($for,Request $request)
    {
            $prefix = "car_".$for."_";

            $start_offset = (!empty(image::where('car_id', '=', $for)->max('img_number'))) ? image::where('car_id', '=', $for)->max('img_number') + 1 : 0 ;
            if (!empty($request->img_uploads[0])) {
                for ($i=0; $i < count($request->img_uploads); $i++) { 
                    $img_number = $start_offset + $i;
                    $extension =$request->file('img_uploads.'.$i)->extension();
                    $imgname = $prefix . $img_number .".". $request->file('img_uploads.'.$i)->extension();
                    $test = $request->file('img_uploads.'.$i)->move(public_path('files'), $imgname);
                    
                    $data['car_id'] = $for;
                    $data['img_number'] = $img_number;

                    $data['extension'] = $extension;
                    image::create($data);
                }
            }
    }
    public function addImage($id,Request $request)
    {
        $this->validate($request, [
            'img_uploads' => 'Required',
            'img_uploads.*' => 'image|max:3000'
            ]);
        $this->storeImages($id, $request);
        return back();
    }
    public function deleteImages(Request $request)
    {
        $this->validate($request, [
            'id' => 'Required'
            ]);
        $id = $request->id;
        $data = array(
        'status' => 'success',
        'message' => 'foto ' .$id. ' verwijdert');
        $imgObj = image::find($id);
        $imgName = 'car_'.$imgObj->car_id.'_'.$imgObj->img_number.'.'.$imgObj->extension;
        $imgPath = public_path().'/files/'.$imgName;

        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
        

        $imgObj->delete();
        return response()->json($data);
    }
    public function imgOrderView($id)
    {   
        $images = image::where('car_id',$id)->orderBy('priority')->get();
        return view('backpanel.imgsort', ['images' => $images,'id'=>$id]);
    }
    public function imgOrderAction(Request $request)
    {   
        $priorities = $request->input('priorities');
        foreach ($priorities as $key => $priority) {
            $image = image::find($key);
            $image->priority = $priority;
            $image->save();
        }
        return 'success';
    }

    public function addCar()
    {
        $carBrands = CarBrands::get()->all(); 

        return view('backpanel.addcar', ['carBrands' => $carBrands]);
    }

    public function carsOverview()
    {
    	$cars = car::all()->where("sold", "LIKE", 0);
        return view('backpanel.cars', ['cars' => $cars]);
    }

    public function setCar(Request $request)
    {	
        
    	$result = $this->validator($request);
        
    	$model = car::create($request->except('img_uploads'));
            $this->storeImages($model->id, $request);
    	return redirect('backpanel/cars');
    }
    public function editCarForm($id)
    {	
    	$car = car::find($id);
        $carBrands = carBrands::get()->all();

    	return view('backpanel/editcar' ,['car' => $car, 'id' => $id, 'carBrands' => $carBrands]);
    }
    public function editCar($id, Request $request)
    {
    	$this->validator($request);

    	car::find($id)->update($request->all());
    	return redirect('backpanel/cars');
    }

    public function deleteCar($id, Request $request)
    {
        if($request['hard-delete'] === 'yes') {
            car::destroy($id);
        } else {
            //Validation rules
            $this->validate($request, [
                'spend-on' => 'required',
                'sold-for' => 'required',
            ]);

            $spend = $request['spend-on'];
            $sold = $request['sold-for'];

        	$car = car::find($id);
            $car->spend_on = $spend;
            $car->sold_for = $sold;
            $car->sold = 1;

            $car->save();
        }

    	return redirect('backpanel/cars');
    }

    public function getSales()
    {
        $sales = car::select('*', DB::raw('sold_for - spend_on as car_sales'))->where("sold", "=", 1)->get();
        // dd($sales);
        $total = 0;

        foreach ($sales as $key => $sale) {
            $total += $sale->car_sales;
        }

        // dd($total);
        return view('backpanel.sales', ['sales' => $sales, 'total' => $total]);
    }
    public function manageBrandsModels()
    {
        //Get all the brands
        $carBrands = CarBrands::get()->all();

        return view('backpanel.manage-brands', ['carBrands' => $carBrands]);
    }

    public function getModels()
    {
        $brandID = $_GET['brandID'];
        $carModels = CarModels::where('brand_id', $brandID)->get();

        return response()->json($carModels);
    }

    public function setBrand(Request $request)
    {
        $this->validate($request, [
            'brand' => 'Required|unique:car_brands'
        ]);

        $brand = new CarBrands;
        $brand->brand = ucfirst($request->brand);
        $brand->save();

        return redirect('backpanel/manage-brands');
    }

    public function editBrand(Request $request)
    {
        $brand = $request['brand'];
        $id = $request['id'];

        $carBrands = CarBrands::get()->all();
        $doubleInput = "no";


        foreach($carBrands as $carBrand){
            if($carBrand->brand == $brand){
                $doubleInput = "yes"; 
            } 
        }

        if($doubleInput === "yes") {
            return "error";
        }
        else {
            $carBrand = CarBrands::find($id);
            $carBrand->brand = $brand;
            $carBrand->save();

            return redirect('backpanel/manage-brands');
        }
    }

    public function deleteBrand($id)
    {
        $brand = CarBrands::find($id);
        $brand->delete();

        return redirect('backpanel/manage-brands');
    }

    public function setModel(Request $request)
    {
        $this->validate($request, [
            'model' => 'Required|unique:car_models',
            'brand_id' => 'Required'
        ]);

        $model = new CarModels;
        $model->model = ucfirst($request->model);
        $model->brand_id = $request->brand_id;
        $model->save();

        return redirect('backpanel/manage-brands');
    }

    public function editModel(Request $request)
    {
        $model = $request['model'];
        $id = $request['id'];

        $carModels = CarModels::get()->all();
        $doubleInput = "no";


        foreach($carModels as $carModel){
            if($carModel->model == $model){
                $doubleInput = "yes"; 
            } 
        }

        if($doubleInput === "yes") {
            return "error";
        }
        else {
            $carModel = CarModels::find($id);
            $carModel->model = $model;
            $carModel->save();

            return redirect('backpanel/manage-brands');
        }
    }

    public function deleteModel($id)
    {
        $model = CarModels::find($id);
        $model->delete();

        return redirect('backpanel/manage-brands');
    }   
}