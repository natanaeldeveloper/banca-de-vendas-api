<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductOffered>
 */
class ProductOfferedFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'notebook_id' => null,
            'product_id' => null,
            'count_offered' => $this->faker->randomDigit(),
        ];
    }
}
