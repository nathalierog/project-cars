<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModels extends Model
{
    protected $table = 'car_models';

    public function brand()
    {
    	return $this->belongsTo('App\CarBrands', 'brand_id');
    }
}
