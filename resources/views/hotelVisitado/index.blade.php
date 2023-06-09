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
    <div class="m-10">
        <div class="mb-4 flex justify-between items-center">
            <a class="cursor-pointer" href="ofertas"><img class="inline-block w-16"
                    src="{{ URL::asset('img/logo.svg') }}" /></a>
            <a class="top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        </div>
        <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
        </div>
        <div class="container m-10">
            <div class="text-6xl text-[#727272] mb-10">
                <p>¡Hola, <span class="font-bold">{{ Auth::user()->name }}</span>!</p>
            </div>

            <div class="text-2xl text-[#4B4B4B]">
                <p class="font-bold inline-block border-b-4 border-b-[#4B4B4B] pb-3">Hoteles</p>
                <a href="restauranteVisitado">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Restaurantes</p>
                </a>
                <a href="opiniones">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Opiniones</p>
                </a>
                <a href="perfil">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Mi perfil</p>
                </a>
            </div>

            <div class="mt-10 text-black">
                <div class="flex justify-between items-center">
                    <h1 class="text-4xl uppercase">Hoteles visitados</h1>
                    <h1 class="cursor-pointer hover:text-slate-600 text-xl uppercase"><img class="w-7 mr-2 inline-block"
                            src="{{ URL::asset('img/mas.svg') }}" />Añadir visita</h1>
                </div>
                @foreach ($hotelVisitado as $visitado)
                    @if ($visitado->idUsu == Auth::user()->idUsu)
                        <div class="flex bg-white my-6 shadow-lg flex-wrap justify-center">
                            <div class="grid grid-cols-2 gap-3 ml-3 relative p-6">
                                <div>
                                    <div class="nombre mb-3">
                                        <a href="/hotelDetallado?query={{ $visitado->hotel->nombre }}">
                                            <p class="text-2xl font-bold uppercase hover:underline cursor-pointer">
                                                {{ $visitado->hotel->nombre }}, {{ $visitado->hotel->ciudad->nombre }}
                                            </p>
                                        </a>
                                    </div>
                                    <div class="fecha">
                                        <p class="text-lg uppercase">Fecha</p>
                                        <p class="text-base">
                                            {{ date('d/m/y', strtotime($visitado->fechaEntrada)) }} -
                                            {{ date('d/m/y', strtotime($visitado->fechaEntrada)) }}
                                        </p>
                                    </div>
                                    <div class="comentario mt-3">
                                        <p class="text-lg uppercase">Comentario</p>
                                        <p class="text-base">{{ $visitado->comentario }} </p>
                                    </div>
                                </div>
                                <div class="valoracion ml-3 mt-11">
                                    <p class="text-lg uppercase">Valoración</p>
                                    <p class="text-base">Ubicación · {{ $visitado->punUbi }} </p>
                                    <p class="text-base">Limpieza · {{ $visitado->punLim }} </p>
                                    <p class="text-base">Servicio · {{ $visitado->punSer }} </p>
                                    <p class="text-base">Calidad-Precio · {{ $visitado->punCalPre }} </p>
                                </div>
                                <div class="absolute top-3 right-6 flex flex-col justify-end mr-3 mt-3">
                                    <div class="editar">
                                        <p
                                            class="cursor-pointer text-lg hover:text-teal-900 text-teal-700 font-bold uppercase flex items-center">
                                            <img class="w-7 inline-block" src="{{ URL::asset('img/editar.svg') }}" />
                                            &nbspEditar
                                        </p>
                                    </div>
                                    <div class="Borrar mt-3">
                                        <p
                                            class="cursor-pointer text-lg hover:text-red-900 text-red-600 font-bold uppercase flex items-center">
                                            <img class="w-7 inline-block" src="{{ URL::asset('img/basura.svg') }}" />
                                            &nbspBorrar
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


</body>

</html>
