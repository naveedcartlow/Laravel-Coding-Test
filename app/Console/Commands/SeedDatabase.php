<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Console\Command;

class SeedDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dummy data command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Create sample customers
        Customer::factory()->count(10)->create()->each(function ($customer) {
            // Create orders and items for each customer
            $orders = Order::factory()->count(2)->create(['customer_id' => $customer->id]);
            foreach ($orders as $order) {
                Item::factory()->count(3)->create(['order_id' => $order->id]);
            }
        });

        $this->info('Database seeded successfully!');
    }
}
