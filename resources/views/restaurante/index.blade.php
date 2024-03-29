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

            <h1 class="absolute text-5xl text-white md:text-6xl lg:text-7xl xl:text-9xl">
                <a class="cursor-pointer font-bold" href="ofertas"> TravelFree
                    <img class="inline-block w-16 md:w-20 lg:w-28" src="{{ URL::asset('img/logo.svg') }}" /></a>
            </h1>


        </div>

        <div class="ml-6 mt-6 text-black">
            <a href="ciudad?query={{ $query }}" class="text-sm hover:underline"><img
                    class="inline-block w-5 mr-2" src="{{ URL::asset('img/volver.svg') }}" />
                <p class="translationText inline-block hover:underline" data-translation-key="volver">Volver</p>
            </a>
        </div>

        <div class="flex items-center m-10 mt-6 mb-3 text-black text-3xl">
            <p>{{ $total }}&nbsp
            <p class="translationText inline-block" data-translation-key="restEn">restaurantes en</p>
            <span class="uppercase font-bold"> &nbsp{{ $ciudad->nombre }} </span></p>
        </div>

        <div class="flex mx-10">
            <div class="w-full mb-4">
                <div class="grid md:grid-cols-3 gap-4 p-4 justify-center">
                    @foreach ($restaurantes as $i => $restaurante)
                        @php
                            $numeroRes = ($restaurantes->currentPage() - 1) * $restaurantes->perPage() + $i + 1;
                        @endphp
                        <div class="max-w-sm rounded overflow-hidden shadow-lg relative">
                            <img class="w-full" src="{{ $restaurante->foto1 }}" alt="Imagen 1">
                            <div class="px-6 py-4">
                                <a class="cursor-pointer hover:font-bold hover:underline"
                                    href="/restauranteDetallado?query={{ $restaurante->nombre }}">
                                    <div class="text-xl mb-2">{{ $numeroRes }}. {{ $restaurante->nombre }}</div>
                                </a>
                                <span class="text-base">{{ $restaurante->tipoCocina }} · </span>
                                <span class="text-lg">{{ $restaurante->precio }}</span>
                                @if ($restaurante->media > 0)
                                    <p
                                        class="text-2xl text-white rounded-lg bg-slate-400 p-1 w-fit absolute bottom-4 right-4">
                                        {{ number_format($restaurante->media, 1) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $restaurantes->appends(request()->query())->links() }}

            </div>
        </div>

        <div class="botones">
            <img src="{{ URL::asset('img/ukflag.svg') }}"> <button class="traducir" id="EnglishButton">English</button>
            <img src="{{ URL::asset('img/spainflag.svg') }}"><button class="traducir"
                id="SpanishButton">Español</button>
        </div>
    </div>

</body>

</html>
