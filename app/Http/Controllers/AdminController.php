<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\car;
use App\image;

class AdminController extends Controller
{	
	private function validator($request)
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
            'img_uploads' => 'Required',
            'img_uploads.*' => 'image|max:3000'
    		]);
	}
    private function storeImages($for,Request $request)
    {
            $prefix = $request->brand."_".$request->model."_".$for."_";

            for ($i=0; $i < count($request->img_uploads); $i++) { 

                $imgname = $prefix . $i .".". $request->file('img_uploads.'.$i)->extension();

                $request->file('img_uploads.'.$i)->move(public_path('files'), $imgname);
            }
    }
    public function cars()
    {
    	$cars = car::all();
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
    	return view('backpanel/editcar' ,['car' => $car, 'id' => $id]);
    }
    public function editCar($id, Request $request)
    {
    	$this->validator($request);

    	car::find($id)->update($request->all());
    	return redirect('backpanel/cars');
    }

    public function deleteCar($id)
    {
    	car::destroy($id);
    	return redirect('backpanel/cars');
    }
}
