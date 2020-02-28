<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    //
    protected $fillable = ['city_id','name'];
    
    public function city(){

        return $this->belongsTo('App\Models\City');
    }


}
