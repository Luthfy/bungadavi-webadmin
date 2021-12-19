<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            'name' => 'superadmin',
            'email' => 'superadmin@bungadavi.co.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
        ]);

        $superadmin->assignRole(['superadmin', 'bungadavi', 'corporate', 'affiliate']);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@bungadavi.co.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('bungadavi');
    }
}
