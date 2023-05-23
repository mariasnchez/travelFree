<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\HotelVisitadoController;
use App\Http\Controllers\RestauranteVisitadoController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/destinos', DestinoController::class)->middleware('auth');
Route::resource('/ofertas', OfertaController::class);
Route::resource('/ciudad', CiudadController::class);
Route::resource('/hotel', HotelController::class);
Route::resource('/restaurante', RestauranteController::class);
Route::resource('/hotelVisitado', HotelVisitadoController::class)->middleware('auth');
Route::resource('/restauranteVisitado', RestauranteVisitadoController::class)->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
