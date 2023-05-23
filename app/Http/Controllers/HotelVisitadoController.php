<?php

namespace App\Http\Controllers;

use App\Models\HotelVisitado;
use Illuminate\Http\Request;

class HotelVisitadoController extends Controller
{
    public function index()
    {
        $hotelVisitado = HotelVisitado::paginate();

         return view('hotelVisitado.index', compact('hotelVisitado'))
             ->with('i', (request()->input('page', 1) - 1) * $hotelVisitado->perPage());
    }
}
