<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurante>
 */
class RestauranteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->streetName(),
            'direccion' => fake()->streetAddress(),
            'telefono' => fake()->e164PhoneNumber(),
            'tipoCocina' => fake()->word(),
            'descripcion' => fake()->text($maxNbChars = 200),
            'precio' => '€',
            'foto1' => fake()->imageUrl($width = 640, $height = 480),
            'idCiudad' => fake()->numberBetween(1,15),
        ];
    }
}
