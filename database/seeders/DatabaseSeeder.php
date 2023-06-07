<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Destino::factory(15)->create();
        \App\Models\Ciudad::factory(15)->create();
        \App\Models\Hotel::factory(150)->create();
        \App\Models\HotelVisitado::factory(350)->create();
        \App\Models\Restaurante::factory(150)->create();
        \App\Models\RestauranteVisitado::factory(350)->create();
        \App\Models\Oferta::factory(30)->create();

        
        
    }
}
