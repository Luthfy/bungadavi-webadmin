<?php

namespace Database\Seeders;

use App\Models\Courier\Courier;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courier::create([
            'uuid' => 'af490f55-eea5-496c-853e-f208b472d8ba',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'fullname' => 'Administrator',
            'mobile' => '081345768712',
            'email' => 'admin@gmail.com',
            'gender' => '1',
            'DOB' => '1997-09-21',
            'marital_status' => '1',
            'point' => '90',
            'ktp' => '317441122344589',
            'country' => '101',
            'province' => '1',
            'city' => '2',
            'district' => '2',
            'address' => 'Jalan jalan',
            'npwp' => '12123458172',
            'contract_number' => '1',
            'join_date' => '2021-09-08',
            'end_date' => '2021-11-30',
            'license_type' => '1',
            'license_number' => '123',
            'license_expired_date' => '2021-11-30',
            'terminate_date' => '2021-11-30',
            'bank_name' => 'BCA',
            'bank_beneficiary_name' => 'BCA',
            'bank_account_number' => '23122131232',
            'bank_branch' => 'BCA',
            'photo' => 'https://bit.ly/3nEWddx',
            'ktp_images' => 'https://bit.ly/3nEWddx',
            'npwp_images' => 'https://bit.ly/3nEWddx',
        ]);
    }
}
