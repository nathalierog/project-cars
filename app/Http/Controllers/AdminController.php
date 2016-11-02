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
    		'main_img' => '',
    		'description' => 'Required',
            'img_uploads' => 'Required',
            'img_uploads.*' => 'image|max:3000'
    		]);
	}
    private function storeImages($for,Request $request)
    {
            $prefix = "car_".$for."_";

            $start_offset = (!empty(image::where('car_id', '=', $for)->max('img_number'))) ? image::where('car_id', '=', $for)->max('img_number') + 1 : 0 ;
            dump($start_offset);
            dump($request->file('img_uploads'));

            for ($i=0; $i < count($request->img_uploads); $i++) { 
                $img_number = $start_offset + $i;
                $extension =$request->file('img_uploads.'.$i)->extension();
                $imgname = $prefix . $img_number .".". $request->file('img_uploads.'.$i)->extension();
                dump($imgname);
                $test = $request->file('img_uploads.'.$i)->move(public_path('files'), $imgname);
                
                $data['car_id'] = $for;
                $data['img_number'] = $img_number;

                $data['extension'] = $extension;
                image::create($data);
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
        // dd($request->all());
    }

    public function cars()
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
    	return view('backpanel/editcar' ,['car' => $car, 'id' => $id]);
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
}
