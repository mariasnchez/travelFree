@extends('layouts.app')


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelFree</title>

</head>

<body class="bg-[#ECECEC]">
    <div class="contenedor">

        <div class="m-10">
            <div class="mb-4 flex justify-between items-center">
                <img class="inline-block w-16" src="{{ URL::asset('img/logo.svg') }}" />
            </div>
            <div class=" mt-6 text-black">
                <a href="/restauranteVisitado" class="text-lg hover:underline"><img class="inline-block w-5 mr-2"
                        src="{{ URL::asset('img/volver.svg') }}" />
                    <p class="translationText inline-block hover:underline" data-translation-key="volver">Volver</p>
                </a>
            </div>
            <div class="container m-10 mt-3">
                <div class="text-4xl text-center text-[#727272] mb-6">
                    <p class="translationText" data-translation-key="nuevaVis">Nueva visita </p>
                </div>
                <div class=" mb-10 rounded-lg">


                    @includeif('partials.errors')

                    <div class="m-10 mt-2">

                        <div class="container mx-auto px-4">
                            <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg">
                                <div class="p-6">
                                    <form method="POST" action="{{ route('restauranteVisitado.store') }}">
                                        @csrf

                                        <div class="mb-4">
                                            <label for="restaurante"
                                                class="block uppercase font-bold mb-1 translationText"
                                                data-translation-key="restaurante">Restaurante</label>
                                            <select name="restaurante" id="restaurante"
                                                class="border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                                @foreach ($restaurantes as $restaurante)
                                                    <option value="{{ $restaurante->nombre }}">
                                                        {{ $restaurante->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="fechaVisita"
                                                class="block uppercase font-bold mb-1 translationText"
                                                data-translation-key="fecha">Fecha
                                                visita</label>
                                            <input type="date" name="fechaVisita" id="fechaVisita"
                                                class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                                required>
                                        </div>

                                        <div>
                                            <div class="mb-4">
                                                <label for="comida"
                                                    class="block uppercase font-bold mb-1 translationText"
                                                    data-translation-key="punCom">Puntuación de
                                                    comida</label>
                                                <input type="number" name="comida" id="comida"
                                                    class="border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                                    min="0" max="10" step="0.1" required>
                                            </div>


                                            <div class="mb-4">
                                                <label for="servicio"
                                                    class="block uppercase font-bold mb-1 translationText"
                                                    data-translation-key="punSer">Puntuación de
                                                    servicio</label>
                                                <input type="number" name="servicio" id="servicio"
                                                    class=" border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                                    min="0" max="10" step="0.1" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="calidadPrecio"
                                                    class="block uppercase font-bold mb-1 translationText"
                                                    data-translation-key="punCalPre">Puntuación
                                                    de
                                                    calidad-precio</label>
                                                <input type="number" name="calidadPrecio" id="calidadPrecio"
                                                    class=" border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                                    min="0" max="10" step="0.1" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="comentario"
                                                    class="block uppercase font-bold mb-1 translationText"
                                                    data-translation-key="comentario">Comentario</label>
                                                <textarea name="comentario" id="comentario"
                                                    class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500" required></textarea>
                                            </div>

                                            <div>
                                                <button type="submit"
                                                    class="bg-slate-500 hover:bg-slate-700 text-white font-bold uppercase py-2 px-4 rounded translationText"
                                                    data-translation-key="añadirVis">Añadir
                                                    visita</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="botones">
            <img src="{{ URL::asset('img/ukflag.svg') }}"> <button class="traducir" id="EnglishButton">English</button>
            <img src="{{ URL::asset('img/spainflag.svg') }}"><button class="traducir"
                id="SpanishButton">Español</button>
        </div>
    </div>
</body>
