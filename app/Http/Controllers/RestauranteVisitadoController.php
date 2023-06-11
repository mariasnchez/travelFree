<?php

namespace App\Http\Controllers;

use App\Models\RestauranteVisitado;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestauranteVisitadoController extends Controller
{
    public function index()
    {
        $restauranteVisitado = RestauranteVisitado::all();
        $restauranteVisitadoUsuario = $restauranteVisitado->where('idUsu', Auth::user()->idUsu);


        return view('restauranteVisitado.index', compact('restauranteVisitado', 'restauranteVisitadoUsuario'));
    }

    public function destroy($id)
    {
        $restauranteVisitado = RestauranteVisitado::find($id)->delete();

        return redirect()
            ->route("restauranteVisitado.index")
            ->with(
                "success",
                "El restaurante visitado ha sido borrado correctamente"
            );
    }


    public function edit($idResVis)
{
    $restauranteVisitado = RestauranteVisitado::find($idResVis);

    return view("restauranteVisitado.edit", compact("restauranteVisitado"));
}


    public function update(Request $request, $idResVis)
    {
        $restauranteVisitado = RestauranteVisitado::find($idResVis);
        $restauranteVisitado->fechaVisita = $request->input("fechaVisita");
        $restauranteVisitado->punCom = $request->input("comida");
        $restauranteVisitado->punSer = $request->input("servicio");
        $restauranteVisitado->punCalPre = $request->input("calidadPrecio");
        $restauranteVisitado->comentario = $request->input("comentario");
        $restauranteVisitado->save();

        return redirect()
            ->route("restauranteVisitado.index")
            ->with(
                "success",
                "El restaurante ha sido actualizado correctamente"
            );
    }

    public function create()
    {
        $restauranteVisitado = new RestauranteVisitado();
        $restaurantes = Restaurante::all();
        return view(
            "restauranteVisitado.create",
            compact("restauranteVisitado", "restaurantes")
        );
    }

    public function store(Request $request)
    {
        $restaurante = Restaurante::where("nombre", $request->input('restaurante'))->first();

        $restauranteVisitado = new RestauranteVisitado();
        $restauranteVisitado->fechaVisita = $request->input("fechaVisita");
        $restauranteVisitado->punCom = $request->input("comida");
        $restauranteVisitado->punSer = $request->input("servicio");
        $restauranteVisitado->punCalPre = $request->input("calidadPrecio");
        $restauranteVisitado->comentario = $request->input("comentario");
        $restauranteVisitado->idUsu = Auth::user()->idUsu;
        $restauranteVisitado->idRes = $restaurante->idRes;

        $restauranteVisitado->save();

        return redirect()
            ->route("restauranteVisitado.index")
            ->with("success", "El restaurante ha sido actualizado correctamente");
    }
}
