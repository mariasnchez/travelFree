<?php
namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

use Response;
    use DB;

class CiudadController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input("query");
        $ciudades = Ciudad::all();
        $ciudad = Ciudad::where("nombre", $query)->first();

        if (!$ciudad) {
            abort(404);
        }

        $hotelesDestacados = $ciudad
            ->hotel()
            ->limit(4)
            ->get();
        $restaurantesDestacados = $ciudad
            ->restaurante()
            ->limit(4)
            ->get();

        return view("ciudad.index", [
            "ciudad" => $ciudad,
            "query" => $query,
            "hotelesDestacados" => $hotelesDestacados,
            "restaurantesDestacados" => $restaurantesDestacados,
            "ciudades" => $ciudades,
        ]);
    }

    public function edit(Ciudad $ciudad)
    {
        return view("users.ciudad.edit", compact("ciudad"));
    }

    public function update(Request $request, $idCiudad)
    {
        $ciudad = Ciudad::findOrFail($idCiudad);
        $ciudad->nombre = $request->input("nombre");
        $ciudad->pais = $request->input("pais");
        $ciudad->descripcion = $request->input("descripcion");
        $ciudad->foto1 = $request->input("foto1");
        $ciudad->foto2 = $request->input("foto2");
        $ciudad->foto3 = $request->input("foto3");
        $ciudad->foto4 = $request->input("foto4");

        $ciudad->save();

        return redirect()
            ->route("users.ciudad.index")
            ->with("success", "Ciudad actualizado exitosamente");
    }

    public function create()
    {
        return view("users.ciudad.create");
    }

    public function store(Request $request)
    {
        $ciudad = new Ciudad();
        $ciudad->nombre = $request->input("nombre");
        $ciudad->pais = $request->input("pais");
        $ciudad->descripcion = $request->input("descripcion");
        $ciudad->foto1 = $request->input("foto1");
        $ciudad->foto2 = $request->input("foto2");
        $ciudad->foto3 = $request->input("foto3");
        $ciudad->foto4 = $request->input("foto4");

        $ciudad->save();

        return redirect()
            ->route("users.ciudad.index")
            ->with("success", "Ciudad añadida exitosamente");
    }

    public function show(Request $request)
        {
            $data = trim($request->valor);
            $result = DB::table('ciudad')
            ->where('nombre','like', $data.'%')
            ->limit(5)
            ->get();
            return response()->json([
                "estado"=>1,
                "result" => $result
            ]);
        }
    

}
