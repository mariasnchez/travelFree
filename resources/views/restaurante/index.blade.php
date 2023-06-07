@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelFree</title>
    <style>
        .bg-image {
            background-image: url('{{ asset('img/cabecera.jpg') }}');
        }
    </style>
</head>

<body class="bg-[#ECECEC]">


    <div class="grid place-items-center h-60 bg-image bg-cover">
        <div class="absolute inset-0 bg-black opacity-40 h-60"></div>
        <div>
            <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>

        <h1 class="absolute text-9xl text-white">
            <a class="cursor-pointer" href="ofertas"> TravelFree
                <img class="inline-block w-28" src="{{ URL::asset('img/logo.svg') }}" /></a>
        </h1>

    </div>

    <div class="ml-6 mt-6 text-black">
        <a href="ciudad?query={{ $query }}" class="text-sm hover:underline"><img class="inline-block w-5 mr-2"
                src="{{ URL::asset('img/volver.svg') }}" />Volver</a>
    </div>

    <div class="flex items-center m-10 mt-6 mb-3 text-black text-3xl">
        <p>{{ $total }} restaurantes en </p>
        <p class="uppercase font-bold">&nbsp{{ $ciudad->nombre }} </p>
    </div>

    <div class="flex mx-10">
        <div class="w-1/4 p-4">
            <div class="w-full h-16 bg-white rounded-md mb-4">
                <p class="text-center"> filtros </p>
            </div>
        </div>
        <div class="w-3/4">
            <div class="grid grid-cols-3 gap-4 p-4">
                @foreach ($restaurantes as $i => $restaurante)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg relative">
                        <img class="w-full" src="{{ $restaurante->foto1 }}" alt="Imagen 1">
                        <div class="px-6 py-4">
                            <a class="cursor-pointer hover:font-bold hover:underline"
                                href="/restauranteDetallado?query={{ $restaurante->nombre }}">
                                <div class="text-xl mb-2">{{ $i + 1 }}. {{ $restaurante->nombre }}</div>
                            </a>
                            <span class="text-base">{{ $restaurante->tipoCocina }} · </span>
                            <span class="text-lg">{{ $restaurante->precio }}</span>
                            @if ($restaurante->media > 0)
                                    <p class="text-2xl text-white rounded-lg bg-slate-400 p-1 w-fit absolute bottom-4 right-4">
                                        {{ number_format($restaurante->media, 1) }}
                                    </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



</body>

</html>
