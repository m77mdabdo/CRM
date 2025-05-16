<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer>
 */
class customerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [


            'name'     => $this->faker->name,
            'email'    => $this->faker->unique()->safeEmail,
            'phone'    => $this->faker->phoneNumber,
            'user_id'  => User::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
