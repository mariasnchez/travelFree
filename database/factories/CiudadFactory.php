<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ciudad>
 */
class CiudadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->city(),
            'pais' => fake()->country(),
            'descripcion' => fake()->text($maxNbChars = 200),
            'foto1' => fake()->imageUrl($width = 640, $height = 480),
        ];
    }
}
