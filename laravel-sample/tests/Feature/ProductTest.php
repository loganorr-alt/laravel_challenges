<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Review;



use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ProductTest extends TestCase
{
    use RefreshDatabase; 

    /**
     * A basic feature test example.
     */
    public function testGetAverageRating(): void
    {
        $product = Product::factory()->create();
        $customer = Customer::factory()->create();

        // confirm that the average can handle no reviews
        $this->assertEquals(0, $product->getAverageRating());

        // Add some reviews - 3, 4, and 5, should average out to 4.
        for ($i = 3; $i <= 5; $i++) {
            Review::factory()->create([
                'product_id' => $product->id,
                'customer_id' => $customer->id,
                'rating' => $i,
            ]);
        }

        $this->assertEquals(4, $product->getAverageRating());

    }

    public function testNonExistentProductPage(): void
    {
        // test that a non-existent product returns a 404`
        $response = $this->get('/products/1');
        $response->assertStatus(404);
    }

    public function testExistentingProductPage(): void {
        // test that an existent product returns a 200
        $product = Product::factory()->create();
        $response = $this->get('/products/' . $product->id);
        $response->assertStatus(200);
    }
}
