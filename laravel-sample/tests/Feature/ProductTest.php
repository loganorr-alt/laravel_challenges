<?php

namespace Tests\Feature;

use App\Models\Product;


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
        $test_product = Product::factory()->create();

        $result = $test_product->getAverageRating();

        $this->assertEquals(5, $result);
    }
}
