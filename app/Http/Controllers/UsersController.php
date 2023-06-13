<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Ciudad;
use App\Models\Restaurante;
use App\Models\Hotel;
use App\Models\Oferta;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $nombre = Auth::user()->name;
        $email = Auth::user()->email;

        return view("users.index", compact("nombre"));
    }

    public function ciudad()
    {
        $ciudades = Ciudad::paginate(10);

        foreach ($ciudades as $ciudad) {
            $ciudad->descripcion = Str::limit($ciudad->descripcion, 50);
        }

        return view("/users/ciudad.index", compact("ciudades"));
    }

    public function hotel()
    {
        $hoteles = Hotel::paginate(10);

        foreach ($hoteles as $hotel) {
            $hotel->descripcion = Str::limit($hotel->descripcion, 50);
        }

        return view("/users/hotel.index", compact("hoteles"));
    }

    public function restaurante()
    {
        $restaurantes = Restaurante::paginate(10);

        foreach ($restaurantes as $restaurante) {
            $restaurante->descripcion = Str::limit(
                $restaurante->descripcion,
                50
            );
        }

        return view("/users/restaurante.index", compact("restaurantes"));
    }
    public function oferta()
    {
        $ofertas = Oferta::paginate(10);

        return view("/users/oferta.index", compact("ofertas"));
    }

    public function usuario()
    {
        $usuarios = User::paginate(10);

        return view("/users/usuario.index", compact("usuarios"));
    }

}
