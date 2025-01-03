<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => fake()->unique()->userName(),
            'unit_price' => fake()->numberBetween(10, 30),
            'unit_type' => fake()->randomElement(['sft', 'kg'])
        ];
    }
}
