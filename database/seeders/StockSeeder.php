<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Stock\Stock;
use Illuminate\Database\Seeder;
use App\Models\BasicSetting\Unit;

class StockSeeder extends Seeder
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
                'name_stock' => 'Red Rose',
                'type_stock' => '0',
                'qty_stock' => '0',
                'image_stock' => null,
                'is_active' => '1',
                'unit_id' => Unit::where('name', 'Pcs')->first()->id,
                'user_uuid' => User::where('email', 'admin@bungadavi.co.id')->first()->uuid ?? null
            ],
            [
                'name_stock' => 'White Rose',
                'type_stock' => '0',
                'qty_stock' => '0',
                'image_stock' => null,
                'is_active' => '1',
                'unit_id' => Unit::where('name', 'Pcs')->first()->id,
                'user_uuid' => User::where('email', 'admin@bungadavi.co.id')->first()->uuid ?? null
            ]
        ];

        foreach ($data as $value) {
            Stock::create($value);
        }
    }
}
