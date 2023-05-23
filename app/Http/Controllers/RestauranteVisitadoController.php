<?php

namespace App\Http\Controllers;

use App\Models\RestauranteVisitado;
use Illuminate\Http\Request;

class RestauranteVisitadoController extends Controller
{
    public function index()
    {
        $restauranteVisitado = RestauranteVisitado::paginate();

         return view('restauranteVisitado.index', compact('restauranteVisitado'))
             ->with('i', (request()->input('page', 1) - 1) * $restauranteVisitado->perPage());
    }
}
