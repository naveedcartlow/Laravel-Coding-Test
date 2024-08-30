<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Seed customers with related orders and items
        Customer::factory()
            ->count(10)
            ->hasOrders(2)
            ->create();
    }
}