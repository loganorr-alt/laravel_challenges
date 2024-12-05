<?php

/**
 * Confirm average rating works.
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