<?php

namespace App\Http\Controllers;

use App\models\City;
use App\models\DeliveryTime;
use App\Models\ExceptionDay;
use Dotenv\Validator;
use Illuminate\Http\Request;

class RestController extends Controller
{
    //

    public function index()
    {


        return "index of api";
    }

    public function addCity(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $city = new City([
            'name' => $request->name,
        ]);

        $city->save();

        return $city;
    }

    public function addDelivery(Request $request)
    {

        $this->validate($request, [
            'delivery_at' => 'required|string'
        ]);

        $delivery =  new  DeliveryTime([
            'delivery_at' => $request->delivery_at,
        ]);
        $delivery->save();

        return $delivery;
    }

    public function attachCity($city_id, Request $request)
    {

        $city =  City::findOrFail($city_id);

        $this->validate($request, [
            'delivery_times' => 'required|array',
            'delivery_times.*' => 'integer|exists:delivery_times,id',
        ]);

        $delivery_times = (array) $request->delivery_time;

        $city->deliveryTime()->attach($delivery_times);

        return $city->deliveryTime;
    }

    public function  filter($city_id, $number_of_days)
    {
        $city =  City::findOrFail($city_id);
        $resulta = [
            'dates' => [],
        ];

        for ($i = 0; $i < $number_of_days; $i++) {

            $date = today()->addDays($i);
            if (ExceptionDay::where('day_name', $date->dayName)->orWhere('date', $date)->get()->count() > 0) // if exceptionDays jumps
                continue;
            $resulta['dates'][] = [
                'day_name' => $date->dayName,
                'date' => $date->format('y-m-d'),
                'delivery_times' => $city->deliveryTime
            ];
        }

        return $resulta;
    }
}
