<?php

namespace Database\Seeders\BasicSetting;

use Illuminate\Database\Seeder;
use App\Models\BasicSetting\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Aneka Bunga',
                'name_en' => 'Kind of Flowers',
                'priority' => '1',
                'photo' => null,
                'is_active' => '1',
            ],
            [
                'name' => 'Rangkaian',
                'name_en' => 'Flower Arrangements ',
                'priority' => '2',
                'photo' => null,
                'is_active' => '1',
            ],
            [
                'name' => 'Acara',
                'name_en' => 'Ceremonial',
                'priority' => '3',
                'photo' => null,
                'is_active' => '1',
            ],
            [
                'name' => 'Hadiah Lain',
                'name_en' => 'Other Gifts',
                'priority' => '4',
                'photo' => null,
                'is_active' => '1',
            ],
            [
                'name' => 'Bunga Papan',
                'name_en' => 'Flower Board',
                'priority' => '5',
                'photo' => null,
                'is_active' => '1',
            ]
        ];

        foreach ($category as $value) {
            Category::create($value);
        }
    }
}
