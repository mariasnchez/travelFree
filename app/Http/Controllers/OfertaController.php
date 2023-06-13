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

    public function edit(Oferta $oferta)
    {
        return view("users.oferta.edit", compact("oferta"));
    }

    public function update(Request $request, $idOferta)
    {
        $oferta = Oferta::findOrFail($idOferta);
        $oferta->precioOferta = $request->input("precioOferta");
        $oferta->fechaFin = $request->input("fechaFin");
        $oferta->idHotel = $request->input("idHotel");

        $oferta->save();

        return redirect()
            ->route("users.oferta.index")
            ->with("success", "Oferta actualizadoa exitosamente");
    }

    public function create()
    {
        return view("users.oferta.create");
    }

    public function store(Request $request)
    {
        $oferta = new Oferta();
        $oferta->precioOferta = $request->input("precioOferta");
        $oferta->fechaFin = $request->input("fechaFin");
        $oferta->idHotel = $request->input("idHotel");

        $oferta->save();

        return redirect()
            ->route("users.oferta.index")
            ->with("success", "oferta añadida exitosamente");
    }
}
