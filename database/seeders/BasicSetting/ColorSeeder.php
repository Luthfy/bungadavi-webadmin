<?php

namespace Database\Seeders\BasicSetting;

use Illuminate\Database\Seeder;
use App\Models\BasicSetting\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'White','hexa' => '#FFFFFF'],
            ['name' => 'Black','hexa' => '#000000'],
            ['name' => 'Gray','hexa' => '#333333'],
        ];

        foreach ($data as $value) {
            Color::create($value);
        }
    }
}
