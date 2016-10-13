<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo('App\car');
    }
}
