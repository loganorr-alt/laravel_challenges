<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //a manual approach to seeding with out using a factory.
        for ($i = 1; $i <= 10; $i++) {
            $customer = [
                'name' => "Customer $i",
                'email' => "customer_$i@example.com",
                'phone' => "$i-555-555-5555",
            ];

            Customer::create($customer);
        }
    }
}
