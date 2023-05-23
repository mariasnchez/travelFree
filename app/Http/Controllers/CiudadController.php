<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudad = Ciudad::paginate();

         return view('ciudad.index', compact('ciudad'))
             ->with('i', (request()->input('page', 1) - 1) * $ciudad->perPage());
    }

}
