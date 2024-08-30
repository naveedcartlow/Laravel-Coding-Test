<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'order_number' => $this->faker->unique()->word,
        ];
    }
}
