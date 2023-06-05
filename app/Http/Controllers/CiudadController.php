<?php
namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $ciudades = Ciudad::all();
        $ciudad = Ciudad::where('nombre', $query)->first();
    
        if (!$ciudad) {
            abort(404);
        }
    
        $hotelesDestacados = $ciudad->hotel()->limit(4)->get();
        $restaurantesDestacados = $ciudad->restaurante()->limit(4)->get();
    
        return view('ciudad.index', [
            'ciudad' => $ciudad,
            'query' => $query,
            'hotelesDestacados' => $hotelesDestacados,
            'restaurantesDestacados' => $restaurantesDestacados,
            'ciudades' => $ciudades,

        ]);
    }
}

// class CiudadController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index(Request $request)
//     {
//         $query = $request->query("query");
//         $ciudad = Ciudad::paginate();

//         return view("ciudad.index", compact("ciudad", "query"))->with(
//             "i",
//             (request()->input("page", 1) - 1) * $ciudad->perPage()
//         );
//     }
// }
