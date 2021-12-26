<?php

namespace Database\Seeders\BasicSetting;

use App\Models\BasicSetting\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'  => 'Rupiah',
                'code'  => 'Rp',
                'symbol'=> 'Rp'
            ],
            [
                'name'  => 'Dollar',
                'code'  => 'Dlr',
                'symbol'=> '$'
            ],
        ];

        foreach ($data as $value) {
            Currency::create($value);
        }

    }
}
