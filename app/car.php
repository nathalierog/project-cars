<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    //
    protected $guarded = [];

    public function images()
    {
    	return $this->hasMany('App\image');
    }

    public function brand()
    {
    	return $this->belongsTo('App\CarBrands', 'brand_id');
    }

    public function model()
    {
        return $this->belongsTo('App\CarModels', 'model_id');
    }
}
