<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelVisitado;
use App\Models\Ciudad;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        $ciudad = Ciudad::where('nombre', $query)->first();

        $total = Hotel::whereHas('ciudad', function ($queryBuilder) use ($query) {
            $queryBuilder->where('nombre', $query);
        })->count();

        $hoteles = Hotel::whereHas('ciudad', function ($queryBuilder) use ($query) {
            $queryBuilder->where('nombre', $query);
        })->get();


        $hoteles->each(function ($hotel) {
            $hotelVisitado = HotelVisitado::where('idHotel', $hotel->idHotel)->get();
            $numeroComentarios = HotelVisitado::where('idHotel', $hotel->idHotel)->count();
            $sumaTotal = 0;
        
            foreach ($hotelVisitado as $visitado) {
                $sumaTotal += $visitado->punUbi + $visitado->punLim + $visitado->punSer + $visitado->punCalPre;
            }
        
            if ($numeroComentarios > 0) {
                $media = $sumaTotal / ($numeroComentarios * 4);
                $mediaRedondeada = round($media, 1);
            } else {
                $mediaRedondeada = 0;
            }
        
            $hotel->media = $mediaRedondeada;
        });
        

        return view('hotel.index', compact('hoteles', 'query', 'total', 'ciudad'));
    }

    public function edit(Hotel $hotel)
    {
        return view("users.hotel.edit", compact("hotel"));
    }

    public function update(Request $request, $idHotel)
    {
        $hotel = Hotel::findOrFail($idHotel);
        $hotel->nombre = $request->input("nombre");
        $hotel->direccion = $request->input("direccion");
        $hotel->descripcion = $request->input("descripcion");
        $hotel->precio = $request->input("precio");
        $hotel->foto1 = $request->input("foto1");
        $hotel->foto2 = $request->input("foto2");
        $hotel->foto3 = $request->input("foto3");
        $hotel->foto4 = $request->input("foto4");
        $hotel->idCiudad = $request->input("idCiudad");

        $hotel->save();

        return redirect()
            ->route("users.hotel.index")
            ->with("success", "Hotel actualizado exitosamente");
    }

    public function create()
    {
        return view("users.hotel.create");
    }

    public function store(Request $request)
    {
        $hotel = new Hotel();
        $hotel->nombre = $request->input("nombre");
        $hotel->direccion = $request->input("direccion");
        $hotel->descripcion = $request->input("descripcion");
        $hotel->precio = $request->input("precio");
        $hotel->foto1 = $request->input("foto1");
        $hotel->foto2 = $request->input("foto2");
        $hotel->foto3 = $request->input("foto3");
        $hotel->foto4 = $request->input("foto4");
        $hotel->idCiudad = $request->input("idCiudad");

        $hotel->save();

        return redirect()
            ->route("users.hotel.index")
            ->with("success", "Hotel añadido exitosamente");
    }
}

