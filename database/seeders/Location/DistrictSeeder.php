<?php

namespace Database\Seeders\Location;;

use App\Models\Location\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district_list = [
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '01',
                'name' => 'Tebet',
                'jne_code' => 'CGK10209',
                'sicepat_code' => 'CGK10209',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '01',
                'name' => 'Setia Budi',
                'jne_code' => 'CGK10208',
                'sicepat_code' => 'CGK10208',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '02',
                'name' => 'Tanah Abang',
                'jne_code' => 'CGK10308',
                'sicepat_code' => 'CGK10308',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '02',
                'name' => 'Senen',
                'jne_code' => 'CGK10307',
                'sicepat_code' => 'CGK10307',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '03',
                'name' => 'Palmerah',
                'jne_code' => 'CGK10105',
                'sicepat_code' => 'CGK10105',
            ]
        ];

        foreach ($district_list as $value) {
            District::create($value);
        }

    }
}
