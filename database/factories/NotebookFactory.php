<?php

namespace Database\Factories;

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

        $standsId = Stand::all()->pluck('id');

        return [
            'stand_id' => fake()->randomElement($standsId),
            'reference_date' => $this->faker->date(),
            'finished' => $this->faker->randomElement([true, false]),
        ];
    }
}
