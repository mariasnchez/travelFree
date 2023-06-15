@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelFree</title>
    @vite(['resources/css/main.scss'])

    <script src="{{ asset('js/carrusel.js') }}"></script>

</head>

<body class="bg-[#ECECEC] mb-10">
    <audio id="carousel-audio">
        <source src="{{ asset('audio/audio.mp3') }}" type="audio/mpeg">
    </audio>
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

        <h1 class="absolute text-5xl mt-4 text-white md:text-6xl lg:text-7xl xl:text-9xl">
            <a class="cursor-pointer" href="ofertas"> TravelFree
                <img class="inline-block w-16 md:w-20 lg:w-28" src="{{ URL::asset('img/logo.svg') }}" /></a>
        </h1>

    </div>

    <div class="flex items-center text-center m-16 ml-10 mb-6 text-[#727272] text-6xl uppercase font-bold">
        <h1>{{ $ciudad->nombre }}</h1>
    </div>

    <div class="flex justify-center mx-10 ">
        <form action="ciudad" method="GET" class="w-full max-w-sm">
            <div class="flex">
                <input type="text" id="mysearch" class="search-input" name="query"
                    placeholder="¿A qué ciudad quieres ir?">
                <button type="submit" id="buscar">Buscar</button>
            </div>
            <ul id="showlist" tabindex='1' class="list-group"></ul>

        </form>
    </div>


    <div class="flex items-center justify-center mt-6 mb-10">
        <div class="relative bg-white rounded-md w-44 mx-2 hover:bg-slate-100 ">
            <a href="hotel?query={{ $query }}"
                class="flex flex-col items-start justify-end h-full p-4 text-black">
                <img class="inline-block w-8" src="{{ URL::asset('img/hotel.svg') }}" />
                <span class="text-base font-bold">HOTELES</span>
            </a>
        </div>
        <div class="relative bg-white rounded-md w-44 mx-2 hover:bg-slate-100 ">
            <a href="restaurante?query={{ $query }}"
                class="flex flex-col items-start justify-end h-full p-4 text-black">
                <img class="inline-block w-8" src="{{ URL::asset('img/restaurante.svg') }}" />
                <p class="text-base font-bold">RESTAURANTES</p>
            </a>
        </div>
    </div>


    <div class="flex justify-center">
        <div class="carousel w-full m-5 md:w-3/5 lg:w-2/5 ">
            <div class="carousel-container">
                <div class="slide">
                    <img src="{{ $ciudad->foto1 }}" alt="Imagen 1">
                </div>
                @for ($i = 2; $i <= 4; $i++)
                    @if (!empty($ciudad->{'foto' . $i}))
                        <div class="slide">
                            <img src="{{ $ciudad->{'foto' . $i} }}" alt="Imagen {{ $i }}">
                        </div>
                    @endif
                @endfor
            </div>
            @if (!empty($ciudad->foto2) || !empty($ciudad->foto3) || !empty($ciudad->foto4))
                <a class="prev" onclick="previousSlide()">&#10094;</a>
                <a class="next" onclick="nextSlide()">&#10095;</a>
            @endif
        </div>
    </div>

    <div class="flex items-center m-10 mb-3 md:ml-36 text-black text-3xl">
        <p>Un poco sobre</p>
        <p class="uppercase font-bold">&nbsp{{ $ciudad->nombre }} </p>
    </div>

    <div class="flex items-center m-10 mt-4 ml-16 mr-16 md:ml-36 md:mr-36 text-black text-xl">
        <p>[{{ $ciudad->descripcion }}]</p>
    </div>

    <div class="flex items-center m-10 text-black text-4xl uppercase">
        <h1>Hoteles destacados</h1>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 m-10">
        @foreach ($hotelesDestacados as $hotel)
            <a class="cursor-pointer" href="/hotelDetallado?query={{ $hotel->nombre }}">
                <div class="relative max-w-sm rounded overflow-hidden shadow-lg hover:scale-105">
                    <img class="w-full" src="{{ $hotel->foto1 }}" alt="">
                    <div class="absolute bottom-0 left-0 bg-black bg-opacity-20 hover:bg-opacity-40 w-full h-full">
                    </div>
                    <div class="absolute bottom-0 left-0 text-white px-2 py-1">
                        <p class="font-bold text-lg md:text-xl uppercase">{{ $hotel->nombre }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="flex items-center m-10 text-black text-4xl uppercase">
        <h1>Restaurantes destacados</h1>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 m-10">
        @foreach ($restaurantesDestacados as $restaurante)
            <a class="cursor-pointer" href="/restauranteDetallado?query={{ $restaurante->nombre }}">
                <div class="relative max-w-sm rounded overflow-hidden shadow-lg hover:scale-105">
                    <img class="w-full" src="{{ $restaurante->foto1 }}" alt="">
                    <div class="absolute bottom-0 left-0 bg-black bg-opacity-20 hover:bg-opacity-40 w-full h-full">
                    </div>
                    <div class="absolute bottom-0 left-0 text-white px-2 py-1">
                        <p class="font-bold text-lg md:text-xl uppercase">{{ $restaurante->nombre }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <script src="{{ asset('js/buscador.js') }}" type="module"></script>
    <script src="{{ asset('js/localRecientes.js') }}" type="module"></script>


</body>

</html>
