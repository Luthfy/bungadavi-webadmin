<?php

namespace Database\Seeders\BasicSetting;

use Illuminate\Database\Seeder;
use App\Models\BasicSetting\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Pcs'],
            ['name' => 'Ikat'],
            ['name' => 'Box']
        ];

        foreach ($data as $value) {
            Unit::create($value);
        }

    }
}
