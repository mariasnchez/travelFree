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

        .search-input {
            background-image: url('{{ asset('img/buscador.svg') }}');
            background-repeat: no-repeat;
            background-position: 10px center;
            padding-left: 40px;
        }
    </style>

</head>

<body class="bg-[#ECECEC]">


    <div class="grid place-items-center h-60 bg-image bg-cover">
        <div class="absolute inset-0 bg-black opacity-40 h-60"></div>
        <div>
            @if (Auth::check())
                <div>
                    <img class="absolute m-6 left-0 top-0 w-10" src="{{ URL::asset('img/user.png') }}">
                    <p class="absolute m-8 left-10 top-0 w-40 text-white">{{ Auth::user()->name }}</p>
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
            TravelFree
            <img class="inline-block w-28" src="{{ URL::asset('img/logo.svg') }}" />
        </h1>
    </div>

    <div class="flex items-center justify-center m-5">
        <div class="flex items-center justify-between shadow-xl w-full px-80 mx-4 py-16 bg-slate-300">
            <form action="ciudad" method="GET" class="w-full">
                <div class="flex">
                    <select id="search-input" name="query"
                        class="search-input rounded-md w-full appearance-none border-0 py-3 pl-12 pr-4 outline-none hover:bg-slate-100 focus:bg-slate-100 mt-4 mb-4 h-16">
                        <option value="">¿Dónde quieres ir?</option>
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->nombre }}">{{ $ciudad->nombre }}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="flex rounded-md items-center justify-center bg-slate-500 hover:bg-slate-600 text-white py-2 px-4 ml-1 mt-4 mb-4">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div class="flex items-center m-10 text-black text-4xl uppercase">
        <h1>Búsquedas recientes</h1>
    </div>


    <div class="flex items-center m-10 text-black text-4xl uppercase">
        <h1>Ciudades destacadas</h1>
    </div>

    <div class="grid grid-cols-4 gap-4 m-10">
        @foreach ($ciudades as $key => $ciudad)
            @if ($key < 4)
                <a class="cursor-pointer" href="/ciudad?query={{ $ciudad->nombre }}">
                    <div class="relative max-w-sm rounded overflow-hidden shadow-lg hover:scale-105">
                        <img class="w-full" src="{{ $ciudad->foto1 }}" alt="">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-20 hover:bg-opacity-40 w-full h-full">
                        </div>
                        <div class="absolute bottom-0 left-0 text-white px-2 py-1">
                            <p class="font-bold text-xl uppercase">{{ $ciudad->nombre }}</p>
                            <p class="text-xs uppercase">{{ $ciudad->pais }}</p>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>


    <div class="flex items-center m-10 text-black text-4xl uppercase">
        <h1>Las mejores ofertas en el momento</h1>
    </div>

    <div class="grid grid-cols-3 gap-4 m-10">
        @php
            $randomOfertas = $oferta->shuffle()->take(6);
        @endphp

        @foreach ($randomOfertas as $oferta)
            <a class="cursor-pointer" href="/hotelDetallado?query={{ $oferta->hotel->nombre }}">
                <div class="relative max-w-full rounded overflow-hidden shadow-lg hover:scale-105">
                    <img class="w-full h-auto" src="{{ $oferta->hotel->foto1 }}" alt="">
                    <div class="absolute bottom-0 left-0 bg-black bg-opacity-20 hover:bg-opacity-40 w-full h-full">
                    </div>
                    <div class="absolute top-0 left-0 p-2 text-white">
                        <p class="font-bold text-xl uppercase">{{ $oferta->hotel->nombre }}</p>
                        <p class="text-xs uppercase">{{ $oferta->hotel->ciudad->nombre }}</p>
                    </div>
                    <div class="absolute bottom-0 right-0 text-white px-2 py-1">
                        <p class="text-lg line-through inline-block">{{ $oferta->hotel->precio }}€</p>
                        <p class="font-bold text-3xl inline-block">{{ $oferta->precioOferta }}€</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>




</body>

</html>
