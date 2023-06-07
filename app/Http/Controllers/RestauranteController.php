<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Models\RestauranteVisitado;
use App\Models\Ciudad;

use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query("query");

        $ciudad = Ciudad::where("nombre", $query)->first();

        $total = Restaurante::whereHas("ciudad", function ($queryBuilder) use (
            $query
        ) {
            $queryBuilder->where("nombre", $query);
        })->count();

        $restaurantes = Restaurante::whereHas("ciudad", function (
            $queryBuilder
        ) use ($query) {
            $queryBuilder->where("nombre", $query);
        })->get();

        $restaurantes->each(function ($restaurante) {
            $restauranteVisitado = RestauranteVisitado::where('idRes', $restaurante->idRes)->get();
            $numeroComentarios = RestauranteVisitado::where('idRes', $restaurante->idRes)->count();
            $sumaTotal = 0;
        
            foreach ($restauranteVisitado as $visitado) {
                $sumaTotal += $visitado->punCom + $visitado->punSer + $visitado->punCalPre;
            }
        
            if ($numeroComentarios > 0) {
                $media = $sumaTotal / ($numeroComentarios * 3);
                $mediaRedondeada = round($media, 1);
            } else {
                $mediaRedondeada = 0;
            }
        
            $restaurante->media = $mediaRedondeada;
        });

        return view(
            "restaurante.index",
            compact("restaurantes", "query", "total", "ciudad")
        );
    }
}
