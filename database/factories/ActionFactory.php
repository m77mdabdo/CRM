<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Action;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{

    protected $model = Action::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'customer_id' => Customer::factory(),
            'user_id' => User::factory(),
            'action_type' => $this->faker->randomElement(['call', 'visit', 'follow_up']),
            'action_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
