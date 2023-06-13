<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make("12345678"),
            'admin' => true,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        User::factory(10)->create();
        \App\Models\Ciudad::factory(15)->create();
        \App\Models\Hotel::factory(150)->create();
        \App\Models\HotelVisitado::factory(350)->create();
        \App\Models\Restaurante::factory(150)->create();
        \App\Models\RestauranteVisitado::factory(350)->create();
        \App\Models\Oferta::factory(30)->create();

        
        
    }
}
