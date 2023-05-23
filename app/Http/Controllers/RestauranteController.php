<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function index()
    {
        $restaurante = Restaurante::paginate();

         return view('restaurante.index', compact('restaurante'))
             ->with('i', (request()->input('page', 1) - 1) * $restaurante->perPage());
    }
}
