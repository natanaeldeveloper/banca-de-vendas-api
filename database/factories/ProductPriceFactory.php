<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPrice>
 */
class ProductPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $productsId = Product::select('id')->get()->pluck('id');

        return [
            'product_id' => fake()->randomElement($productsId),
            'price' => fake()->randomFloat('2', 0.50, 10),
        ];
    }
}
