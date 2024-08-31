<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rentre>
 */
class RentreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Source' => fake()->sentence(),
            'Montant' => fake()->numberBetween(50, 100000),
            'compte_id' => 1,
        ];
    }
}