<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'view order']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);
    }
}
