<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RestauranteVisitado>
 */
class RestauranteVisitadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fechaVisita' => fake()->date($format = '2018-01-01', $max = 'now'),
            'punCom' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'punSer' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'punCalPre' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'comentario' => fake()->text($maxNbChars = 200),
            'idUsu' => fake()->numberBetween(2,10),
            'idRes' => fake()->numberBetween(1,150),
        ];
    }
}
