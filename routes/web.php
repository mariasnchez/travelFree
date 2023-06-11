<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\HotelDetalladoController;
use App\Http\Controllers\RestauranteDetalladoController;
use App\Http\Controllers\HotelVisitadoController;
use App\Http\Controllers\RestauranteVisitadoController;
use App\Http\Controllers\OpinionesController;
use App\Http\Controllers\ProfileController;


Route::get('/', [App\Http\Controllers\OfertaController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'hotel'])->name('home');
Route::get('hotel', 'HomeController@hotel');
Route::get('restaurante', 'HomeController@restaurante');
Route::get('ciudad', 'HomeController@ciudad');

Route::resource('/destinos', DestinoController::class)->middleware('auth');
Route::resource('/ofertas', OfertaController::class);
Route::resource('/ciudad', CiudadController::class);
Route::resource('/hotel', HotelController::class);
Route::resource('/restaurante', RestauranteController::class);
Route::resource('/hotelDetallado', HotelDetalladoController::class);
Route::resource('/restauranteDetallado', RestauranteDetalladoController::class);
Route::resource('/hotelVisitado', HotelVisitadoController::class)->middleware('auth');
Route::resource('/restauranteVisitado', RestauranteVisitadoController::class)->middleware('auth');
Route::resource('/opiniones', OpinionesController::class)->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
