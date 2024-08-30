<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;
    public function definition(): array
    {
        return [
            'order_id' => \App\Models\Order::factory(),
            'name' => $this->faker->word,
        ];
    }
}
