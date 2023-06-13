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
            $restauranteVisitado = RestauranteVisitado::where(
                "idRes",
                $restaurante->idRes
            )->get();
            $numeroComentarios = RestauranteVisitado::where(
                "idRes",
                $restaurante->idRes
            )->count();
            $sumaTotal = 0;

            foreach ($restauranteVisitado as $visitado) {
                $sumaTotal +=
                    $visitado->punCom +
                    $visitado->punSer +
                    $visitado->punCalPre;
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

    public function edit(Restaurante $restaurante)
    {
        return view("users.restaurante.edit", compact("restaurante"));
    }

    public function update(Request $request, $idRes)
    {
        $restaurante = Restaurante::findOrFail($idRes);
        $restaurante->nombre = $request->input("nombre");
        $restaurante->direccion = $request->input("direccion");
        $restaurante->telefono = $request->input("telefono");
        $restaurante->tipoCocina = $request->input("tipoCocina");
        $restaurante->descripcion = $request->input("descripcion");
        $restaurante->precio = $request->input("precio");
        $restaurante->foto1 = $request->input("foto1");
        $restaurante->foto2 = $request->input("foto2");
        $restaurante->foto3 = $request->input("foto3");
        $restaurante->foto4 = $request->input("foto4");
        $restaurante->foto5 = $request->input("foto5");
        $restaurante->foto6 = $request->input("foto6");
        $restaurante->idCiudad = $request->input("idCiudad");

        $restaurante->save();

        return redirect()
            ->route("users.restaurante.index")
            ->with("success", "Restaurante actualizado exitosamente");
    }

    public function create()
    {
        return view("users.restaurante.create");
    }

    public function store(Request $request)
    {
        $restaurante = new Restaurante();
        $restaurante->nombre = $request->input("nombre");
        $restaurante->direccion = $request->input("direccion");
        $restaurante->telefono = $request->input("telefono");
        $restaurante->tipoCocina = $request->input("tipoCocina");
        $restaurante->descripcion = $request->input("descripcion");
        $restaurante->precio = $request->input("precio");
        $restaurante->foto1 = $request->input("foto1");
        $restaurante->foto2 = $request->input("foto2");
        $restaurante->foto3 = $request->input("foto3");
        $restaurante->foto4 = $request->input("foto4");
        $restaurante->foto5 = $request->input("foto5");
        $restaurante->foto6 = $request->input("foto6");
        $restaurante->idCiudad = $request->input("idCiudad");

        $restaurante->save();

        return redirect()
            ->route("users.restaurante.index")
            ->with("success", "Restaurante añadido exitosamente");
    }
}
