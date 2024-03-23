<?php

namespace Database\Factories;

use App\Models\Stand;
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

        $standsId = Stand::all()->pluck('id');

        return [
            'stand_id' => fake()->randomElement($standsId),
            'name' => $this->faker->word(),
            'code' => $this->faker->numberBetween(11111111, 99999999),
        ];
    }
}
