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
        <div class="container lg:m-10 mt-10">
            <div class="text-5xl sm:text-6xl text-[#727272] mb-10">
                <p class="inline-block translationText" data-translation-key="hola">¡Hola,</p> <span
                    class="inline-block font-bold">
                    {{ Auth::user()->name }}</span>!
            </div>

            <div class="grid grid-cols-2 gap-6 sm:flex sm:flex-wrap justify-start">
                <a href="hotelVisitado">
                    <p class=" cursor-pointer hover:text-black translationText" data-translation-key="hoteles">Hoteles
                    </p>
                </a>
                <a href="restauranteVisitado">
                    <p class="cursor-pointer hover:text-black translationText" data-translation-key="restaurantes">
                        Restaurantes</p>
                </a>
                <p class="font-bold  border-b-4 border-b-[#4B4B4B] pb-3 capitalize translationText"
                    data-translation-key="opiniones">Opiniones</p>
                <a href="perfil">
                    <p class=" cursor-pointer hover:text-black translationText" data-translation-key="perfil">Mi perfil
                    </p>
                </a>
            </div>

            <div class="mt-10 text-black">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl sm:text-4xl uppercase translationText" data-translation-key="tusOpi">Tus
                        opiniones</h1>
                </div>
                <div class="mt-4">
                    @if ($opinionesPaginadas->count() === 0)
                        <p class="text-lg mt-2">Aún no hay ninguna opinion.</p>
                    @else
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($opinionesPaginadas as $opinion)
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
                        {{ $opinionesPaginadas->appends(request()->query())->links() }}

                    @endif
                </div>
            </div>
        </div>
    </div>

    <button class="traducir" id="EnglishButton">English</button>
    <button class="traducir" id="SpanishButton">Español</button>


</body>

</html>
