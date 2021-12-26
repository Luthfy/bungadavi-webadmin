<?php

namespace Database\Seeders\Location;

use App\Models\Location\ZipCode;
use Illuminate\Database\Seeder;

class ZipCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zipcode_list = [
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '01',
                'district_id' => '01',
                'village_id' => '01',
                'postal_code' => '12840',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '01',
                'district_id' => '02',
                'village_id' => '02',
                'postal_code' => '12920',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '02',
                'district_id' => '03',
                'village_id' => '03',
                'postal_code' => '10210',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '02',
                'district_id' => '04',
                'village_id' => '04',
                'postal_code' => '10460',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '03',
                'district_id' => '05',
                'village_id' => '05',
                'postal_code' => '11480',
            ]
        ];

        foreach ($zipcode_list as $value) {
            ZipCode::create($value);
        }

    }
}
