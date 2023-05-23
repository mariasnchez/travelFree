<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotel = Hotel::paginate();

         return view('hotel.index', compact('hotel'))
             ->with('i', (request()->input('page', 1) - 1) * $hotel->perPage());
    }
}
