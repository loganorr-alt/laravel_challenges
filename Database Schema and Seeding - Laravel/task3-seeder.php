<?php

namespace Database\Seeders;

use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //a manual approach to seeding with out using a factory.
        for ($i = 1; $i <= 10; $i++) {
            $product = [
                'name' => "Product $i: ". Str::random(10),
                'description' =>  Str::random(7) .' '. Str::random(8),
                'price' => rand(1, 100) / 10, //lets make decimal places a possibility
                'quantity' => rand(1, 30),
            ];

            Product::create($product);
        }
        
        //alternative approach using a factory, arguably nicer. The direct access to the faker library feels cleaner too.
        //See database/factories/ProductFactory.php to see how the factory is defined
        Product::factory()->count(10)->create();
    }
}
