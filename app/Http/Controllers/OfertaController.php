<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function index()
    {
        $oferta = Oferta::paginate();
        $ciudades = Ciudad::all();

        return view('oferta.index', compact('oferta', 'ciudades'))
            ->with('i', (request()->input('page', 1) - 1) * $oferta->perPage());
    }
}
