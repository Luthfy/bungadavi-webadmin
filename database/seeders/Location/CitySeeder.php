<?php

namespace Database\Seeders\Location;;

use App\Models\Location\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city_list = [
            [
                'country_id' => '04',
                'province_id' => '02',
                'alias' => 'Kota',
                'name' => 'Jakarta Selatan',
                'code' => 'CGK',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'alias' => 'Kota',
                'name' => 'Jakarta Pusat',
                'code' => 'CGK',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'alias' => 'Kota',
                'name' => 'Jakarta Barat',
                'code' => 'CGK',
            ],
            [
                'country_id' => '04',
                'province_id' => '01',
                'alias' => 'Kota',
                'name' => 'Denpasar',
                'code' => 'DPS',
            ],
            [
                'country_id' => '04',
                'province_id' => '03',
                'alias' => 'Kota',
                'name' => 'Serang',
                'code' => 'CLG',
            ]
        ];

        foreach ($city_list as $value) {
            City::create($value);
        }

    }
}
