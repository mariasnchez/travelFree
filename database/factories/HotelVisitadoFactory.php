<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelVisitado>
 */
class HotelVisitadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fechaEntrada' => fake()->date($format = '2018-01-01', $max = 'now'),
            'fechaSalida' => fake()->date($format = '2018-01-01', $max = 'now'),
            'punUbi' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'punLim' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'punSer' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'punCalPre' => fake()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            'comentario' => fake()->text($maxNbChars = 200),
            'idUsu' => fake()->numberBetween(2,10),
            'idHotel' => fake()->numberBetween(1,150),
        ];
    }
}
