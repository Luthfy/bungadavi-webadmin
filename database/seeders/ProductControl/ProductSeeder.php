<?php

namespace Database\Seeders\ProductControl;

use App\Models\Client\Florist;
use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $florist = Florist::Where('fullname', 'Bungadavi')->first()->uuid;

        $product =[
            [
            'code_product' => 'ABC1',
            'name_product' => 'Anggrek',
            'short_description_product' => 'Anggrek ungu',
            'short_description_en_product' => 'Purple orchid',
            'description_product' => 'anggrek ungu fresh',
            'description_en_product' => 'fresh purple orchid',
            'currency_uuid' => null,
            'cost_product' => '100',
            'florist_cost_product' => '100',
            'selling_price_product' => '200',
            'selling_florist_price_product' => '200',
            'status_product' => '1',
            'mostwanted_product' => '2',
            'popularity_product' => '2',
            'seen_product' => '10',
            'image_main_product' => 'https://bit.ly/3CI1G7z',
            'images_product' => 'https://bit.ly/3CI1G7z',
            'as_addon_product' => null,
            'minimum_order_product'=> '0',
            'printcmmode_product'=>null,
            'florist_uuid'=>$florist,
            'user_uuid'=>null,
            'is_active'=>'1',
            ],[
                'code_product' => 'ABC2',
                'name_product' => 'Mawar',
                'short_description_product' => 'Mawar merah',
                'short_description_en_product' => 'Red roses',
                'description_product' => 'mawar merah fresh',
                'description_en_product' => 'fresh Red roses',
                'currency_uuid' => null,
                'cost_product' => '100',
                'florist_cost_product' => '100',
                'selling_price_product' => '200',
                'selling_florist_price_product' => '200',
                'status_product' => '1',
                'mostwanted_product' => '2',
                'popularity_product' => '2',
                'seen_product' => '10',
                'image_main_product' => 'https://bit.ly/3CI1G7z',
                'images_product' => 'https://bit.ly/3CI1G7z',
                'as_addon_product' => null,
                'minimum_order_product'=> '0',
                'printcmmode_product'=>null,
                'florist_uuid'=>$florist,
                'user_uuid'=>null,
                'is_active'=>'1',
            ],[
                'code_product' => 'ABC3',
                'name_product' => 'Melati',
                'short_description_product' => 'Melati putih',
                'short_description_en_product' => 'white jasmine',
                'description_product' => 'melati putih fresh',
                'description_en_product' => 'fresh white jasmine',
                'currency_uuid' => null,
                'cost_product' => '100',
                'florist_cost_product' => '100',
                'selling_price_product' => '200',
                'selling_florist_price_product' => '200',
                'status_product' => '1',
                'mostwanted_product' => '2',
                'popularity_product' => '2',
                'seen_product' => '10',
                'image_main_product' => 'https://bit.ly/3CI1G7z',
                'images_product' => 'https://bit.ly/3CI1G7z',
                'as_addon_product' => null,
                'minimum_order_product'=> '0',
                'printcmmode_product'=>null,
                'florist_uuid'=>$florist,
                'user_uuid'=>null,
                'is_active'=>'1',
                ]
        ];

        foreach ($product as $value) {
            Product::create($value);
        }

    }
}
