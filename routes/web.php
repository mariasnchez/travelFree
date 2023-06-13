<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\HotelDetalladoController;
use App\Http\Controllers\RestauranteDetalladoController;
use App\Http\Controllers\HotelVisitadoController;
use App\Http\Controllers\RestauranteVisitadoController;
use App\Http\Controllers\OpinionesController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;



Route::get('/', [App\Http\Controllers\OfertaController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'hotel'])->name('home');
Route::get('hotel', 'HomeController@hotel');
Route::get('restaurante', 'HomeController@restaurante');
Route::get('ciudad', 'HomeController@ciudad');

Route::resource('/ofertas', OfertaController::class);
Route::resource('/ciudad', CiudadController::class);
Route::resource('/hotel', HotelController::class);
Route::resource('/restaurante', RestauranteController::class);
Route::resource('/hotelDetallado', HotelDetalladoController::class);
Route::resource('/restauranteDetallado', RestauranteDetalladoController::class);
Route::resource('/hotelVisitado', HotelVisitadoController::class)->middleware('auth');
Route::resource('/restauranteVisitado', RestauranteVisitadoController::class)->middleware('auth');
Route::resource('/opiniones', OpinionesController::class)->middleware('auth');
Route::resource('/perfil', PerfilController::class)->middleware('auth');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/perfil/{idUsu}/{accion}', [PerfilController::class, 'edit'])->name('perfil.edit');
Route::post('/actualizar', [PerfilController::class, 'actualizar'])->name('actualizar');



Route::get('/admin', function() {

    return view('users.index');

})->name('admin.index')->middleware('canAccess');


Route::middleware('canAccess')->group(function () {

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/usuarios', [UsersController::class, 'usuario'])->name('users.usuario.index');
Route::get('/users/hoteles', [UsersController::class, 'hotel'])->name('users.hotel.index');
Route::get('/users/restaurantes', [UsersController::class, 'restaurante'])->name('users.restaurante.index');
Route::get('/users/ofertas', [UsersController::class, 'oferta'])->name('users.oferta.index');
Route::get('/users/ciudades', [UsersController::class, 'ciudad'])->name('users.ciudad.index');


Route::get('/users/restaurante/{restaurante}/edit', [RestauranteController::class, 'edit'])->name('users.restaurante.edit');
Route::put('/users/restaurante/{idRes}', [RestauranteController::class, 'update'])->name('users.restaurante.update');
Route::get('/users/restaurante/create', [RestauranteController::class, 'create'])->name('users.restaurante.create');
Route::match(['post', 'put'], '/users/restaurante', [RestauranteController::class, 'store'])->name('users.restaurante.store');

Route::get('/users/ciudad/{ciudad}/edit', [CiudadController::class, 'edit'])->name('users.ciudad.edit');
Route::put('/users/ciudad/{idCiudad}', [CiudadController::class, 'update'])->name('users.ciudad.update');
Route::get('/users/ciudad/create', [CiudadController::class, 'create'])->name('users.ciudad.create');
Route::match(['post', 'put'], '/users/ciudad', [CiudadController::class, 'store'])->name('users.ciudad.store');


Route::get('/users/hotel/{hotel}/edit', [HotelController::class, 'edit'])->name('users.hotel.edit');
Route::put('/users/hotel/{idHotel}', [HotelController::class, 'update'])->name('users.hotel.update');
Route::get('/users/hotel/create', [HotelController::class, 'create'])->name('users.hotel.create');
Route::match(['post', 'put'], '/users/hotel', [HotelController::class, 'store'])->name('users.hotel.store');

Route::get('/users/oferta/{oferta}/edit', [OfertaController::class, 'edit'])->name('users.oferta.edit');
Route::put('/users/oferta/{idOferta}', [OfertaController::class, 'update'])->name('users.oferta.update');
Route::get('/users/oferta/create', [OfertaController::class, 'create'])->name('users.oferta.create');
Route::match(['post', 'put'], '/users/oferta', [OfertaController::class, 'store'])->name('users.oferta.store');
});

require __DIR__.'/auth.php';
