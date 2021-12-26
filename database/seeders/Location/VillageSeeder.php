<?php

namespace Database\Seeders\Location;

use App\Models\Location\Village;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $village_list = [
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '01',
                'district_id' => '01',
                'name' => 'Bukit Duri',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '01',
                'district_id' => '02',
                'name' => 'Karet',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '02',
                'district_id' => '03',
                'name' => 'Bendungan Hilir',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '02',
                'district_id' => '04',
                'name' => 'Bungur',
            ],
            [
                'country_id' => '04',
                'province_id' => '02',
                'city_id' => '03',
                'district_id' => '05',
                'name' => 'Kemanggisan',
            ]
        ];

        foreach ($village_list as $value) {
            Village::create($value);
        }

    }
}
