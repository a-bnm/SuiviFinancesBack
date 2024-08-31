<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compte>
 */
class CompteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Designation' => fake()->sentence(),
            'Montant' => fake()->numberBetween(2500, 1000000),
            'user_id' => 1,
            'Description' => fake()->paragraph(5),
        ];
    }
}