<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function index()
    {
        $oferta = Oferta::paginate();

         return view('oferta.index', compact('oferta'))
             ->with('i', (request()->input('page', 1) - 1) * $oferta->perPage());
    }
}
