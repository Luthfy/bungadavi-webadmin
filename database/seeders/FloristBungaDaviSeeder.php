<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer\Affiliate;
use App\Models\Customer\AffiliateBank;

class FloristBungaDaviSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $florist = Affiliate::create([
            "fullname" => 'Bungadavi',
            "owner" => 'Bungadavi',
            "email" => 'info@bungadavi.com',
            "website" => 'bungadavi.co.id',
            "phone" => '123',
            "mobile" => '123',
            "country_id" => '1',
            "province_id" => '1',
            "city_id" => '1',
            "district_id" => '1',
            "village_id" => '1',
            "zipcode_id" => '1',
            "address" => null,
            "latitude" => null,
            "longitude" => null,
            "is_affiliate" => 1,
            "is_special_feature_active" => 1,
            "is_active" => 1,
            "point" => 0,
            "legal_type" => 1,
            "npwp" => null,
            "npwp_image" => null
        ]);

        AffiliateBank::create([
            "client_florist_uuid" => $florist->uuid,
            "bank_name" => 'VRI',
            "bank_account_number" => '123',
            "bank_beneficiary" => 'VRI',
            "bank_branch" => 'VRI',
        ]);
    }
}
