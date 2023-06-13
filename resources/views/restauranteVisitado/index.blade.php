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
        <div class="container m-10">
            <div class="text-6xl text-[#727272] mb-10">
                <p>¡Hola, <span class="font-bold">{{ Auth::user()->name }}</span>!</p>
            </div>

            <div class="text-2xl text-[#4B4B4B]">
                <a href="hotelVisitado">
                    <p class="inline-block cursor-pointer hover:text-black">Hoteles</p>
                </a>
                <p class="font-bold inline-block border-b-4 border-b-[#4B4B4B] pb-3 ml-6">Restaurantes</p>
                <a href="opiniones">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Opiniones</p>
                </a>
                <a href="perfil">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Mi perfil</p>
                </a>
            </div>

            <div class="mt-10 text-black">
                <div class="flex justify-between items-center">
                    <h1 class="text-4xl uppercase">Restaurantes visitados</h1>
                    <a href="{{ URL::to('restauranteVisitado/create') }}">
                        <h1 class="cursor-pointer hover:text-slate-600 text-xl uppercase"><img
                                class="w-7 mr-2 inline-block" src="{{ URL::asset('img/mas.svg') }}" />Añadir visita</h1>
                    </a>
                </div>
                @if ($restauranteVisitadoUsuario->count() === 0)
                    <p class="text-lg mt-2">Aún no hay ningún restaurante visitado.</p>
                @else
                    @foreach ($restauranteVisitado as $visitado)
                        @if ($visitado->idUsu == Auth::user()->idUsu)
                            <div class=" bg-white my-6 shadow-lg flex-wrap justify-start">
                                <div class="grid grid-cols-2 gap-3 ml-3 relative p-6">
                                    <div>
                                        <div class="nombre mb-3">
                                            <a href="/restauranteDetallado?query={{ $visitado->restaurante->nombre }}">
                                                <p class="text-2xl font-bold uppercase hover:underline cursor-pointer">
                                                    {{ $visitado->restaurante->nombre }},
                                                    {{ $visitado->restaurante->ciudad->nombre }}
                                                </p>
                                            </a>
                                        </div>
                                        <div class="fecha">
                                            <p class="text-lg uppercase">Fecha</p>
                                            <p class="text-base">
                                                {{ date('d/m/y', strtotime($visitado->fechaVisita)) }}
                                            </p>
                                        </div>
                                        <div class="comentario mt-3">
                                            <p class="text-lg uppercase">Comentario</p>
                                            <p class="text-base">{{ $visitado->comentario }} </p>
                                        </div>
                                    </div>
                                    <div class="valoracion ml-3 mt-11">
                                        <p class="text-lg uppercase">Valoración</p>
                                        <p class="text-base">Comida · {{ $visitado->punCom }} </p>
                                        <p class="text-base">Servicio · {{ $visitado->punSer }} </p>
                                        <p class="text-base">Calidad-Precio · {{ $visitado->punCalPre }} </p>
                                    </div>
                                    <div class="absolute top-3 right-6 flex flex-col justify-end mr-3 mt-3">
                                        <form action="{{ route('restauranteVisitado.destroy', $visitado->idResVis) }}"
                                            method="POST">
                                            <a href="{{ route('restauranteVisitado.edit', $visitado->idResVis) }}">
                                                <p
                                                    class="cursor-pointer text-lg hover:text-teal-900 text-teal-700 font-bold uppercase flex items-center">
                                                    <img class="w-7 inline-block"
                                                        src="{{ URL::asset('img/editar.svg') }}" />
                                                    &nbspEditar
                                                </p>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <td> <button type="submit" class="mt-3">
                                                    <p
                                                        class="cursor-pointer text-lg hover:text-red-900 text-red-600 font-bold uppercase flex items-center">
                                                        <img class="w-7 inline-block"
                                                            src="{{ URL::asset('img/basura.svg') }}" />
                                                        &nbspBorrar
                                                    </p>
                                                </button> </td>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>


</body>

</html>
