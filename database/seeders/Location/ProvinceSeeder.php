<?php

namespace Database\Seeders\Location;

use App\Models\Location\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province_list = [
            [
                'country_id' => '04',
                'name' => 'Bali',
            ],
            [
                'country_id' => '04',
                'name' => 'DKI Jakarta',
            ],
            [
                'country_id' => '04',
                'name' => 'Banten',
            ],
            [
                'country_id' => '04',
                'name' => 'Bengkulu',
            ],
            [
                'country_id' => '04',
                'name' => 'Jawa Barat',
            ]
        ];

        foreach ($province_list as $value) {
            Province::create($value);
        }

    }
}
