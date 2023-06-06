<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
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
            $media =
                ($restaurante->valCom +
                    $restaurante->valSer +
                    $restaurante->valCalPre) /
                3;
            $restaurante->media = $media;
        });

        return view(
            "restaurante.index",
            compact("restaurantes", "query", "total", "ciudad")
        );
    }
}
