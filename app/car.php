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
}
