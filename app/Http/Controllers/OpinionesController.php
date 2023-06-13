<?php

namespace App\Http\Controllers;

use App\Models\HotelVisitado;
use App\Models\RestauranteVisitado;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class OpinionesController extends Controller
{
    public function index()
    {
        $nombre = Auth::user()->name;
        $email = Auth::user()->email;

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

        $perPage = 15;
        $currentPage = request()->query("page", 1);
        $pagedData = $opiniones
            ->slice(($currentPage - 1) * $perPage, $perPage)
            ->all();
        $opinionesPaginadas = new LengthAwarePaginator(
            $pagedData,
            count($opiniones),
            $perPage,
            $currentPage
        );

        $opinionesPaginadas
            ->withPath(route("opiniones.index"))
            ->appends(request()->query())
            ->links();

        return view("opiniones.index", compact("opinionesPaginadas"));
    }
}
