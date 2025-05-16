<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerEmployee>
 */
class CustomerEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     *
     */
    protected $model = CustomerEmployee::class;
    public function definition(): array
    {
        return [

            //
            'customer_id' => Customer::inRandomOrder()->first()?->id ?? Customer::factory(),
            'user_id'     => User::where('role', 'employee')->inRandomOrder()->first()?->id ?? User::factory()->create(['role' => 'employee'])->id,
            'assigned_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
