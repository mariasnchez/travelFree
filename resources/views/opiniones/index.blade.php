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
    <div class="m-10">
        <div class="mb-4 flex justify-between items-center">
            <a class="cursor-pointer" href="ofertas"><img class="inline-block w-16"
                    src="{{ URL::asset('img/logo.svg') }}" /></a>
            <div>
                @if (Auth::user()->admin == 1)
                    <a class="top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                        href="{{ route('admin.index') }}">

                        Acceder a Admin</a>
                @endif
                <a class="top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </div>
        </div>
        <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
        </div>
        <div class="container m-10">
            <div class="text-6xl text-[#727272] mb-10">
                <p>¡Hola, <span class="font-bold">{{ Auth::user()->name }}</span>!</p>
            </div>

            <div class="text-2xl text-[#4B4B4B]">
                <a href="hotelVisitado">
                    <p class="inline-block cursor-pointer hover:text-black">Hoteles</p>
                </a>
                <a href="restauranteVisitado">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Restaurantes</p>
                </a>
                <p class="font-bold inline-block border-b-4 border-b-[#4B4B4B] pb-3 ml-6">Opiniones</p>
                <a href="perfil">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Mi perfil</p>
                </a>
            </div>

            <div class="mt-10 text-black">
                <div class="flex justify-between items-center">
                    <h1 class="text-4xl uppercase">Tus opiniones</h1>
                </div>
                <div class="mt-4">
                    @if ($opiniones->count() === 0)
                        <p class="text-lg mt-2">Aún no hay ninguna opinion.</p>
                    @else
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($opiniones as $opinion)
                                <div class="bg-white p-4 relative m-1 shadow-lg">
                                    <div class="uppercase font-bold text-lg">
                                        @if ($opinion->tipo === 'hotel')
                                            <a href="/hotelDetallado?query={{ $opinion->nombre }}">
                                                <p class="hover:underline cursor-pointer"> Hotel
                                                    {{ $opinion->hotel->nombre }}
                                                </p>
                                            </a>
                                        @elseif ($opinion->tipo === 'restaurante')
                                            <a href="/restauranteDetallado?query={{ $opinion->nombre }}">
                                                <p class="hover:underline cursor-pointer"> Restaurante
                                                    {{ $opinion->nombre }}
                                                </p>
                                            </a>
                                        @endif
                                    </div>
                                    <p class="mt-1">{{ $opinion->comentario }}</p>
                                    <p class="absolute bottom-0 right-0 mb-1 mr-2 text-xs">
                                        {{ date('d/m/y', strtotime($opinion->fecha)) }}
                                    <p>
                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</body>

</html>
