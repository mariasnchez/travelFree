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
            'valoracion' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'valCom' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'valSer' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'valCalPre' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'foto1' => fake()->imageUrl($width = 640, $height = 480),
            'idCiudad' => fake()->numberBetween(1,15),
        ];
    }
}
