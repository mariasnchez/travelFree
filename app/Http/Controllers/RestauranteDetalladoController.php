<?php

namespace App\Http\Controllers;
use App\Models\Restaurante;
use App\Models\RestauranteVisitado;


use Illuminate\Http\Request;

class RestauranteDetalladoController extends Controller
{
    public function index(Request $request)
    {
    $query = $request->query("query");

    $restaurante = Restaurante::where("nombre", $query)->first();

    $numeroComentarios = RestauranteVisitado::where(
        "idRes",
        $restaurante->idRes
    )->count();

    $restauranteVisitado = RestauranteVisitado::where(
        "idRes",
        $restaurante->idRes
    )->get();

    $media =
    ($restaurante->valCom +
        $restaurante->valSer +
        $restaurante->valCalPre) /
    3;

    $sumaTotal = 0;
    $sumaCom = 0;
    $sumaSer = 0;
    $sumaCalPre = 0;

    foreach ($restauranteVisitado as $visitado) {
        $sumaTotal +=
            $visitado->punCom +
            $visitado->punSer +
            $visitado->punCalPre;
        $sumaCom += $visitado->punCom;
        $sumaSer += $visitado->punSer;
        $sumaCalPre += $visitado->punCalPre;
    }
    if ($numeroComentarios > 0) {
        $media2 = $sumaTotal / ($numeroComentarios * 3);
        $mediaRedondeada = round($media2, 1);
    }  else {
        $mediaRedondeada = 0; 
    }

    return view(
        "restauranteDetallado.index",
        compact(
            "restaurante", "numeroComentarios",
            "media",
            "mediaRedondeada",
            "restauranteVisitado",
            "sumaCom",
            "sumaSer",
            "sumaCalPre"
        )
    );
}
}
