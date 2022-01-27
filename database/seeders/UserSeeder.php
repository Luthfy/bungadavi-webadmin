<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Customer\Affiliate;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@bungadavi.co.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'position' => 'superadmin',
        ]);

        $superadmin->assignRole(['superadmin', 'bungadavi', 'corporate', 'affiliate']);

        $superadmin->givePermissionTo(Permission::all('name')->toArray());

    }
}
