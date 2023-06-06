<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
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
            $media = ($hotel->valUbi + $hotel->valLim + $hotel->valSer + $hotel->valCalPre) / 4;
            $hotel->media = $media;
        });

        return view('hotel.index', compact('hoteles', 'query', 'total', 'ciudad'));
    }
}

