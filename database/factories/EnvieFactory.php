<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Envie>
 */
class EnvieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Desigantion' => fake()->sentence(),
            'Cout' => fake()->numberBetween(1000,100000),
            'CoutRassemble' => fake()->numberBetween(0,100000),
            'CoutRestant' => fake()->numberBetween(0,100000),
            'user_id' => 1,
            'Description' => fake()->paragraph(3),
        ];
    }
}