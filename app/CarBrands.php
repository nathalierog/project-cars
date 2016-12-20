<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBrands extends Model
{
    protected $table = 'car_brands';

    public function models()
    {
    	return $this->hasMany('App\CarModels', 'brand_id');
    }
}