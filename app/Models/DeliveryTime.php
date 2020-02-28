<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    protected $fillable = ['delivery_at'];

    protected  $hidden =  ['pivot'];

    
    public function city()
    {
        return $this->belongsToMany('App\Models\City');
    }

}
