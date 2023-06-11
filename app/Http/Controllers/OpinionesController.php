<?php

namespace App\Http\Controllers;

use App\Models\HotelVisitado;
use App\Models\RestauranteVisitado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OpinionesController extends Controller
{
    public function index()
    {
        $hotelVisitadoUsuario = HotelVisitado::with("hotel")
            ->where("idUsu", Auth::user()->idUsu)
            ->select(
                "fechaEntrada as fecha",
                "comentario",
                "idHotel",
                \DB::raw("'hotel' as tipo")
            )
            ->get();

        $restauranteVisitadoUsuario = RestauranteVisitado::with("restaurante")
            ->where("idUsu", Auth::user()->idUsu)
            ->select(
                "fechaVisita as fecha",
                "comentario",
                "idRes",
                \DB::raw("'restaurante' as tipo")
            )
            ->get();

        $opiniones = $hotelVisitadoUsuario
            ->concat($restauranteVisitadoUsuario)
            ->sortBy("fecha")
            ->map(function ($opinion) {
                if ($opinion->tipo === "hotel") {
                    $modeloInstance = HotelVisitado::where(
                        "idHotel",
                        $opinion->idHotel
                    )->first();
                    $opinion->nombre = $modeloInstance
                        ? $modeloInstance->hotel->nombre
                        : null;
                } else {
                    $modeloInstance = RestauranteVisitado::where(
                        "idRes",
                        $opinion->idRes
                    )->first();
                    $opinion->nombre = $modeloInstance
                        ? $modeloInstance->restaurante->nombre
                        : null;
                }
                return $opinion;
            });

        return view("opiniones.index", compact("opiniones"));
    }
}
