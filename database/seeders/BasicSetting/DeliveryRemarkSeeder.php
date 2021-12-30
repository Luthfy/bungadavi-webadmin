<?php

namespace Database\Seeders\BasicSetting;

use App\Models\BasicSetting\DeliveryRemark;
use Illuminate\Database\Seeder;

class DeliveryRemarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryRemark::create([
            'description' => 'Tinggal Didepan Pintu',
            'description_en' => '',
            'is_active' => '1'
        ]);
    }
}
