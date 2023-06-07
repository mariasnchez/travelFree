<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Oferta>
 */
class OfertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'precioOferta' => fake()->numberBetween($min = 40, $max = 300),
            'fechaFin' => fake()->date($format = '2018-01-01', $max = 'now'),
            'idHotel' => fake()->numberBetween(1,150),
        ];
    }
}
