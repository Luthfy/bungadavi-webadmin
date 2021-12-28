<?php

namespace Database\Seeders;

use App\Models\Customer\Affiliate;
use App\Models\User;
use Faker\Factory;
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
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@bungadavi.co.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'position' => 'superadmin',
        ]);

        $superadmin->assignRole(['superadmin', 'bungadavi', 'corporate', 'affiliate']);

        $admin = User::create([
            'name' => 'Admin Bungadavi',
            'username' => 'admin',
            'email' => 'admin@bungadavi.co.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'position' => 'admin',
            'user_type' => 'bungadavi',
            'customer_uuid' => Affiliate::where('fullname', 'Bungadavi')->first(),
        ]);

        $admin->assignRole('bungadavi');

        $affiliate = User::create([
            'name' => 'Admin Florist Banjarmasin',
            'username' => 'admin florist bjm',
            'email' => 'admin.floristbjm@bungadavi.co.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'position' => 'admin',
            'user_type' => 'affiliate',
            'customer_uuid' => '',
        ]);

        $affiliate->assignRole('affiliate');

        $corporate = User::create([
            'name' => 'Admin Corporate',
            'username' => 'corporate',
            'email' => 'admin.corproate@bungadavi.co.id',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'position' => 'admin',
            'user_type' => 'corporate',
            'customer_uuid' => '',
        ]);

        $corporate->assignRole('corporate');

        if (config('app.env') != 'production') {
            $faker = Factory::create('id_ID');

            for ($i=0; $i < 10; $i++) {
                User::create([
                    'name'      => $faker->name(),
                    'username'  => $faker->userName(),
                    'email'     => $faker->safeEmail(),
                    'email_verified_at' => now(),
                    'password'  => bcrypt('secret'),
                    'remember_token' => Str::random(10),
                    'position'  => 'admin',
                    'user_type' => 'affiliate',
                    'customer_uuid' => '',
                ])->assignRole('affiliate');
            }

            for ($i=0; $i < 10; $i++) {
                User::create([
                    'name'      => $faker->company(),
                    'username'  => $faker->userName(),
                    'email'     => $faker->companyEmail(),
                    'email_verified_at' => now(),
                    'password'  => bcrypt('secret'),
                    'remember_token' => Str::random(10),
                    'position'  => 'admin',
                    'user_type' => 'corporate',
                    'customer_uuid' => '',
                ])->assignRole('corporate');
            }

        }
    }
}
