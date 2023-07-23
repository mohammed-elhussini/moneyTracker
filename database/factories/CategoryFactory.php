<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>  fake()->randomElement(User::pluck('id')),
            'name' => fake()->word() ,
            'description' => fake()->sentence(),
            'icon' => fake()->imageUrl(),
            'parent_id' => fake()->numberBetween(1, 5),
        ];
    }
}
