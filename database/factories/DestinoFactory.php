<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destino>
 */
class DestinoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idUsu' => fake()->numberBetween(1,2),
            'ciudad' => fake()->city(),
            'hotel' => fake()->streetName(),
            'noches' => fake()->numberBetween($min = 1, $max = 20),
            'valoracion' => fake()->numberBetween($min = 0, $max = 10),
        ];
    }
}
