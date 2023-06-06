<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        \App\Models\User::factory(15)->create();
        \App\Models\Destino::factory(15)->create();
        \App\Models\Ciudad::factory(30)->create();
        \App\Models\Hotel::factory(300)->create();
        \App\Models\HotelVisitado::factory(20)->create();
        \App\Models\Restaurante::factory(300)->create();
        \App\Models\RestauranteVisitado::factory(20)->create();
        \App\Models\Oferta::factory(20)->create();

        
        
    }
}
