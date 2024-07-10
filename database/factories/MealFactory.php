<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->name(),
            'price' => fake()->numberBetween(50,500),
            'available_quantity' => fake()->numberBetween(10,150),
            'discount' => fake()->numberBetween(0,20),
        ];
    }
}
