@extends('layouts.app')


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelFree</title>
</head>

<body class="bg-[#ECECEC] contenedor">
    <div class="m-10">
        <div class="mb-4 flex justify-between items-center">
            <img class="inline-block w-16" src="{{ URL::asset('img/logo.svg') }}" />
        </div>
        <div class=" mt-6 text-black">
            <a href="/users/ofertas" class="text-lg hover:underline"><img class="inline-block w-5 mr-2"
                    src="{{ URL::asset('img/volver.svg') }}" />Volver</a>
        </div>
        <div class="container m-10 mt-3">
            <div class="text-4xl text-[#727272] mb-10 text-center">
                <p>Editar la oferta nº {{ $oferta->idOferta }}</p>
            </div>
            <div class=" mb-10 rounded-lg">


                @includeif('partials.errors')

                <div class="m-10">

                    <div class="container mx-auto px-4">
                        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg">
                            <div class="p-6">
                                <form action="{{ route('users.oferta.update', $oferta->idOferta) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="mb-4">
                                        <label for="precioOferta" class="block uppercase font-bold mb-1">Precio</label>
                                        <input type="number" name="precioOferta" id="precioOferta"
                                            value="{{ $oferta->precioOferta }}"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="fechaFin" class="block uppercase font-bold mb-1">Fecha fin</label>
                                        <input type="date" name="fechaFin" id="fechaFin"
                                            value="{{ $oferta->fechaFin }}"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="idHotel" class="block uppercase font-bold mb-1">Id hotel</label>
                                        <input type="number" name="idHotel" id="idHotel"
                                            value="{{ $oferta->idHotel }}"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                            min="0">
                                    </div>

                                    <div>
                                        <button type="submit"
                                            class="bg-slate-500 hover:bg-slate-700 text-white font-bold uppercase py-2 px-4 rounded ">Guardar
                                            cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>
