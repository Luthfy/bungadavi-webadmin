<?php

namespace Database\Seeders;

use App\Models\BasicSetting\OurBank;
use Illuminate\Database\Seeder;

class OurBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OurBank::create([
            'type' => '1',
            'bank_name' => 'BCA',
            'bank_account_number' => '1113331155',
            'bank_beneficiary_name' => 'PT. Bunga Davi Indonesia',
            'bank_code' => '014',
            'bank_logo' => '',
            'bank_branch' => 'KCP Penjernihan',
        ]);
    }
}
