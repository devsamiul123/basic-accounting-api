<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $qty = fake()->numberBetween(1, 10);
        $unit_in_number = fake()->numberBetween(20, 60);
        $unit_in_string = '{{ fake()->numberBetween(1, 5) }} x {{ fake()->numberBetween(2, 9) }}';
        return [
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'qty' => $qty,
            'unit_in_number' => $unit_in_number,
            'unit_in_string' => $unit_in_string,
            'item_price' => $qty * $unit_in_number
        ];
    }
}
