<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StockSeeder;
use Database\Seeders\OurBankSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\CourierSeeder;
use Database\Seeders\Location\CitySeeder;
use Database\Seeders\Location\CountrySeeder;
use Database\Seeders\Location\VillageSeeder;
use Database\Seeders\Location\ZipCodeSeeder;
use Database\Seeders\BasicSetting\UnitSeeder;
use Database\Seeders\Location\DistrictSeeder;
use Database\Seeders\Location\ProvinceSeeder;
use Database\Seeders\BasicSetting\ColorSeeder;
use Database\Seeders\BasicSetting\CategorySeeder;
use Database\Seeders\BasicSetting\CurrencySeeder;
use Database\Seeders\ProductControl\ProductSeeder;
use Database\Seeders\BasicSetting\SubcategorySeeder;
use Database\Seeders\BasicSetting\DeliveryRemarkSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FloristBungaDaviSeeder::class);

        $this->call(UnitSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ColorSeeder::class);

        $this->call(CountrySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(VillageSeeder::class);
        $this->call(ZipCodeSeeder::class);

        $this->call(OurBankSeeder::class);
        $this->call(DeliveryRemarkSeeder::class);

        $this->call(MenuSeeder::class);

        // $this->call(CourierSeeder::class);

        if (config('app.env') != 'production') {
            $this->call(StockSeeder::class);
            $this->call(ProductSeeder::class);
        }

    }
}
