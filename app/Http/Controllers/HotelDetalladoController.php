<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelVisitado;

use Illuminate\Http\Request;

class HotelDetalladoController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query("query");

        $hotel = Hotel::where("nombre", $query)->first();

        $hotelVisitado = HotelVisitado::where(
            "idHotel",
            $hotel->idHotel
        )->get();

        $numeroComentarios = HotelVisitado::where(
            "idHotel",
            $hotel->idHotel
        )->count();


        $sumaTotal = 0;
        $sumaUbi = 0;
        $sumaLim = 0;
        $sumaSer = 0;
        $sumaCalPre = 0;

        foreach ($hotelVisitado as $visitado) {
            $sumaTotal +=
                $visitado->punUbi +
                $visitado->punLim +
                $visitado->punSer +
                $visitado->punCalPre;
            $sumaUbi += $visitado->punUbi;
            $sumaLim += $visitado->punLim;
            $sumaSer += $visitado->punSer;
            $sumaCalPre += $visitado->punCalPre;
        }
        if ($numeroComentarios > 0) {
            $media = $sumaTotal / ($numeroComentarios * 4);
            $mediaRedondeada = round($media, 1);
        }  else {
            $mediaRedondeada = 0; 
        }

        return view(
            "hotelDetallado.index",
            compact(
                "hotel",
                "query",
                "numeroComentarios",
                "mediaRedondeada",
                "hotelVisitado",
                "sumaUbi",
                "sumaLim",
                "sumaSer",
                "sumaCalPre"
            )
        );
    }
}
