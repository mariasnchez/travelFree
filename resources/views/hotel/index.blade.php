@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

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
            @if (Auth::check())
                <div>
                    <a class="cursor-pointer" href="hotelVisitado"><img class="absolute m-6 left-0 top-0 w-10"
                            src="{{ URL::asset('img/user.png') }}">
                        <p class="absolute m-8 left-10 top-0 w-40 text-lg text-white hover:underline">
                            {{ Auth::user()->name }}</p>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="absolute m-6 top-0 right-0">
                        @csrf
                        <button type="submit"
                            class="bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>
            @else
                <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
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
        <p>{{ $total }} hoteles en </p>
        <p class="uppercase font-bold">&nbsp{{ $ciudad->nombre }} </p>
    </div>

    <div class="flex mx-10">
        <div class="w-1/4 p-4">
            <div class="w-full h-16 bg-white rounded-md mb-4">
                <p class="text-center"> filtros </p>
            </div>
        </div>
        <div class="w-3/4">
            <div class="grid grid-cols-1 gap-4 p-4">
                @foreach ($hoteles as $i => $hotel)
                    <div class="bg-white rounded-md p-4 h-40 flex relative">
                        <div class="flex flex-col flex-grow">
                            <a class="cursor-pointer hover:font-bold hover:underline"
                                href="/hotelDetallado?query={{ $hotel->nombre }}">
                                <p class=" text-xl uppercase">{{ $i + 1 }}. {{ $hotel->nombre }}</p>
                            </a>
                            <p class="text-sm">{{ $hotel->direccion }}</p>
                            @if ($hotel->media > 0)
                                <div class="absolute bottom-4 left-4">
                                    <p class="text-2xl text-white rounded-lg bg-slate-400 p-1 w-fit">
                                        {{ number_format($hotel->media, 1) }}
                                    </p>
                                </div>
                            @endif

                        </div>
                        <div class="flex flex-col-reverse">
                            <div class=" mr-4">
                                @if ($hotel->ofertas->count() > 0)
                                    <div class="bg-cyan-500 text-white p-2 w-fit">Oferta disponible</div>
                                @endif
                            </div>
                            <div class="mt-auto mr-4 text-right">
                                <span class="font-bold text-xl">{{ $hotel->precio }}€</span>
                                <span class="text-sm">/noche</span>
                            </div>
                        </div>

                        <img src="{{ $hotel->foto1 }}" alt="Imagen 1" class="ml-auto h-40 -mt-4 -mr-4 ">
                    </div>
                @endforeach
            </div>
        </div>


    </div>

</body>

</html>
