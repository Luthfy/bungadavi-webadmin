<?php

namespace Database\Seeders;

use App\Models\Courier\Courier;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

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
            'uuid' => Uuid::uuid4()->toString(),
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
            'country' => '1',
            'province' => '1',
            'city' => '1',
            'district' => '1',
            'village' => '1',
            'zipcode' => '1',
            'address' => 'Jalan jalan',
            'npwp' => '12123458172',
            'contract_number' => '1',
            'join_date' => '2021-09-08',
            'end_date' => '2021-11-30',
            'license_type' => '1',
            'license_number' => '123',
            'license_expired_date' => '2021-11-30',
            'license_image' => 'https://bit.ly/3nEWddx',
            'terminate_date' => '2021-11-30',
            'terminate_description' => '2021-11-30',
            'bank_name' => 'BCA',
            'bank_beneficiary_name' => 'BCA',
            'bank_account_number' => '23122131232',
            'bank_branch' => 'BCA',
            'photo' => 'https://bit.ly/3nEWddx',
            'ktp_images' => 'https://bit.ly/3nEWddx',
            'npwp_images' => 'https://bit.ly/3nEWddx',
            'fcm' => 'test',
            'token' => Str::random(10),
            'is_active' => 1,

        ]);
    }
}
