<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Product: '. $this->faker->text(10),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'quantity' => $this->faker->randomNumber(2),
        ];
    }
}
