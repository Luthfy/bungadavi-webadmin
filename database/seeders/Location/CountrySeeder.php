<?php

namespace Database\Seeders\Location;

use App\Models\Location\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country_list = [
            [
                'code' => 'AF',
                'name' => 'Afghanistan',
                'base_curr_name' => 'Afghanis',
                'base_curr_code' => 'AFN',
                'base_curr_symbol' => '؋'
            ],
            [
                'code' => 'AR',
                'name' => 'Argentina',
                'base_curr_name' => 'Peso',
                'base_curr_code' => 'ARS',
                'base_curr_symbol' => '$'
            ],
            [
                'code' => 'AU',
                'name' => 'Australia',
                'base_curr_name' => 'Dollar',
                'base_curr_code' => 'AUD',
                'base_curr_symbol' => '$'
            ],
            [
                'code' => 'ID',
                'name' => 'Indonesia',
                'base_curr_name' => 'Rupiah',
                'base_curr_code' => 'IDR',
                'base_curr_symbol' => 'Rp'
            ],
            [
                'code' => 'JM',
                'name' => 'Jamaica',
                'base_curr_name' => 'Dollar',
                'base_curr_code' => 'JMD',
                'base_curr_symbol' => 'J$'
            ]
        ];

        foreach ($country_list as $value) {
            Country::create($value);
        }

    }
}
