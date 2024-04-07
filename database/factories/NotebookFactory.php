<?php

namespace Database\Factories;

use App\Models\Notebook;
use App\Models\ProductOffered;
use App\Models\Stand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $stands = Stand::all();

        return [
            'stand_id' => fake()->randomElement($stands->pluck('id')),
            'reference_date' => $this->faker->date(),
            'finished' => $this->faker->randomElement([true, false]),
        ];
    }

    public function withProductsOffered()
    {
        return $this->afterCreating(function (Notebook $notebook) {

            $productsId = Stand::with('products')->find($notebook->stand_id)->products->pluck('id');

            $notebook->productsOffered()->saveMany(ProductOffered::factory()->count(1)->make([
                'notebook_id' => $notebook->id,
                'product_id' => $this->faker->randomElement($productsId),
            ]));
        });
    }
}