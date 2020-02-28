<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = ['name'];

    public function partner(){

        return $this->hasOne('App\Models\Partner');
    }
    
    public function deliveryTime()
    {
        return $this->belongsToMany('App\Models\DeliveryTime','city_delivery_times')->withTimestamps();
    }



}
