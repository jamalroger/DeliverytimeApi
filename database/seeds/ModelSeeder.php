<?php

use App\User;
use App\models\City;
use App\models\DeliveryTime;
use App\Models\ExceptionDay;
use App\models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cities
        $cities = [
            [
                'name' => 'Casa'
            ],
            [
                'name' => 'Rabat'
            ],
            [
                'name' => 'Tangier:'
            ],
        ];
        // partner
        $partners = [
            [
                'city_id' => 2,
                'name' => 'Mohamed'
            ],
            [
                'city_id' => 1,
                'name' => 'Hassan'
            ],
            [
                'city_id' => 3,
                'name' => 'Nada'
            ],
        ];
        //Exception days
        $exceptionDays = [
            [
                'day_name' => 'Sunday',
            ],
            [
                'day_name' => 'Saturday',
            ],
        ];
        // delivery times
        $deliveryTime = [
            [
                'delivery_at' => '9->12',
            ],
            [
                'delivery_at' => '14->18',
            ],
            [
                'delivery_at' => '10->13',
            ],
            [
                'delivery_at' => '15->19',
            ],
            [
                'delivery_at' => '9->13',
            ],
            [
                'delivery_at' => '14->18',
            ],
            [
                'delivery_at' => '18-20',
            ],
        ];
        // User admin
        $admin = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make("admin"),
            'is_supper' => true,
        ];

        User::create($admin);

        foreach ($cities as  $city)
            City::Create($city);

        foreach ($partners as  $partner)
            Partner::Create($partner);

        foreach ($exceptionDays as $day)
            ExceptionDay::create($day);

        foreach ($deliveryTime as $d)
            DeliveryTime::create($d);

        City::find(1)->DeliveryTime()->attach([3,4]);
        City::find(2)->DeliveryTime()->attach([1,2]);
        City::find(3)->DeliveryTime()->attach([5,6,7]);

    }
}
