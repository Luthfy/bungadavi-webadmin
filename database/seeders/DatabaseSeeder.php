<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PermissionSeeder;

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

        if (config('app.env') != 'production') {
        }

        // \App\Models\User::factory(10)->create()->assignRole('bungadavi');
        // \App\Models\Customer\Admin\Corporate::factory(10)->create();
        // \App\Models\Customer\Admin\Florist::factory(10)->create();
    }
}
