<?php

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