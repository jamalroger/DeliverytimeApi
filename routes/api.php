<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'RestController@index')->name('api.index');

Route::group(['middleware' => ['guest', 'guest:api']], function () {

    Route::post('/login', 'Auth\ApiController@login');

    Route::post('/register', 'Auth\ApiController@register');
});

Route::group(['middleware' => ['api']], function () { // add  middleware ['auth:api','AuthAdmin']

    Route::post('/cities', 'RestController@addCity')->name('api.add.city'); // body:raw|form-data {name:string}

    Route::post('/delivery-times', 'RestController@addDelivery')->name('api.add.delivery.time'); // body:raw|form-data {delivery_at:string}

    Route::post('/cities/{city_id}/delivery-times', 'RestController@attachCity')->name('api.attach.city.to.delivery'); // body:raw|form-data  { delivery_times:array[integer]}

});

Route::get('/cities/{city_id}/delivery-dates-times/{number_of_days}', 'RestController@filter')->name('api.find.from.days');

