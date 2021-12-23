<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FloristFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name(),
            'username'  => $this->faker->userName(),
            'email'     => $this->faker->safeEmail(),
            'email_verified_at' => now(),
            'password'  => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'position'  => 'admin',
            'user_type' => 'affiliate',
            'customer_uuid' => '',
        ];
    }
}
