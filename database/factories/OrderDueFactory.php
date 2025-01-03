<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDue>
 */
class OrderDueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order_id = fake()->randomElement(Order::select('id')->get());
        $total_price = Order::select('total_price')->where('id', $order_id)->first();
        $paid_amount = fake()->numberBetween(0, $total_price);
        $due_amount = $total_price - $paid_amount;
        $order_date = Order::select('order_placing_date')->where('id', $order_id)->first();
        return [
            'order_id' => $order_id,
            'paid_amount' => $paid_amount,
            'due_amount' => $due_amount,
            'paid_date' => fake()->dateTimeBetween($order_date, $order_date.' +2 days')
        ];
    }
}
