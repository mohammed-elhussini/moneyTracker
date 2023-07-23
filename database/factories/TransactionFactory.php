<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word() ,
            'description' => fake()->sentence() ,
            'transaction_date' => fake()->dateTime(),
            'cost' => fake()->randomDigit(),
            'type' => fake()->randomElement(['income', 'expensive']),
            'user_id' => fake()->randomElement(User::pluck('id')->all()),
            'payment_id' => fake()->randomElement(Payment::pluck('id')->all()),
        ];
    }
}
