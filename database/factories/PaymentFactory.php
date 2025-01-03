<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'paid_amount' => fake()->numberBetween(1, 250),
            'payment_type' => fake()->randomElement(['cash', 'mobile banking', 'wire transfer']),
            'payment_account' => fake()->text(22),
            'paid_date' => fake()->date()
        ];
    }
}
