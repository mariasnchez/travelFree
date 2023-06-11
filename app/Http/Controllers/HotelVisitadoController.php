<?php

namespace App\Http\Controllers;

use App\Models\HotelVisitado;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelVisitadoController extends Controller
{
    public function index()
    {
        $hotelVisitado = HotelVisitado::all();
        $hotelVisitadoUsuario = $hotelVisitado->where('idUsu', Auth::user()->idUsu);


        return view("hotelVisitado.index", compact("hotelVisitado", "hotelVisitadoUsuario"));
    }

    public function destroy($id)
    {
        $hotelVisitado = HotelVisitado::find($id)->delete();

        return redirect()
            ->route("hotelVisitado.index")
            ->with(
                "success",
                "El hotel visitado ha sido borrado correctamente"
            );
    }

    public function edit($idHotVis)
    {
        $hotelVisitado = HotelVisitado::find($idHotVis);

        return view("hotelVisitado.edit", compact("hotelVisitado"));
    }

    public function update(Request $request, $idHotVis)
    {
        $hotelVisitado = HotelVisitado::find($idHotVis);
        $hotelVisitado->fechaEntrada = $request->input("fechaEntrada");
        $hotelVisitado->fechaSalida = $request->input("fechaSalida");
        $hotelVisitado->punLim = $request->input("limpieza");
        $hotelVisitado->punSer = $request->input("servicio");
        $hotelVisitado->punUbi = $request->input("ubicacion");
        $hotelVisitado->punCalPre = $request->input("calidadPrecio");
        $hotelVisitado->comentario = $request->input("comentario");
        $hotelVisitado->save();

        return redirect()
            ->route("hotelVisitado.index")
            ->with("success", "El hotel ha sido actualizado correctamente");
    }

    public function create()
    {
        $hotelVisitado = new HotelVisitado();
        $hoteles = Hotel::all();
        return view(
            "hotelVisitado.create",
            compact("hotelVisitado", "hoteles")
        );
    }

    public function store(Request $request)
    {
        $hotel = Hotel::where("nombre", $request->input('hotel'))->first();

        $hotelVisitado = new HotelVisitado();
        $hotelVisitado->fechaEntrada = $request->input("fechaEntrada");
        $hotelVisitado->fechaSalida = $request->input("fechaSalida");
        $hotelVisitado->punUbi = $request->input("ubicacion");
        $hotelVisitado->punLim = $request->input("limpieza");
        $hotelVisitado->punSer = $request->input("servicio");
        $hotelVisitado->punCalPre = $request->input("calidadPrecio");
        $hotelVisitado->comentario = $request->input("comentario");
        $hotelVisitado->idUsu = Auth::user()->idUsu;
        $hotelVisitado->idHotel = $hotel->idHotel;

        $hotelVisitado->save();

        return redirect()
            ->route("hotelVisitado.index")
            ->with("success", "El hotel ha sido actualizado correctamente");
    }
}
