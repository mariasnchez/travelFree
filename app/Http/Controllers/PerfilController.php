<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelVisitado;
use App\Models\RestauranteVisitado;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PerfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $hotelVisitado = HotelVisitado::all();
        $hoteles = $hotelVisitado->where("idUsu", Auth::user()->idUsu);

        $restauranteVisitado = RestauranteVisitado::all();
        $restaurantes = $restauranteVisitado->where(
            "idUsu",
            Auth::user()->idUsu
        );

        return view("perfil.index", compact("user", "hoteles", "restaurantes"));
    }

    public function edit($idUsu, $accion)
    {
        $usuario = User::find($idUsu);

        if ($accion === "editar") {
            return view("perfil.edit", compact("usuario"));
        } elseif ($accion === "cambiar") {
            return view("perfil.cambiar", compact("usuario"));
        }
    }
    public function update(Request $request, $idUsu)
    {
        $usuario = User::find($idUsu);
        $usuario->name = $request->input("nombre");
        $usuario->email = $request->input("email");
        $usuario->save();

        return redirect()
            ->route("perfil.index")
            ->with("success", "El perfil ha sido actualizado correctamente");
    }

    public function cambiar($idUsu)
    {
        $usuario = User::find($idUsu);

        return view("perfil.cambiar", compact("usuario"));
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'contrasena_actual' => 'required',
            'nueva_contrasena' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->contrasena_actual, $user->password)) {
            return back()->withErrors(['contrasena_actual' => 'La contraseña actual es incorrecta.']);
        }

        $user->password = Hash::make($request->nueva_contrasena);
        $user->save();

        return redirect()->route('perfil.index')->with('success', '¡Contraseña actualizada exitosamente!');
    }
}
