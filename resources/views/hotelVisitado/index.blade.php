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
                <p>¡Hola, <span class="font-bold">{{ Auth::user()->name }}</span>!</p>
            </div>

            <div class="grid grid-cols-2 gap-6 sm:flex sm:flex-wrap justify-start">
                <p class="font-bold border-b-4 border-[#4B4B4B] pb-3">Hoteles</p>
                <a href="restauranteVisitado">
                    <p class="cursor-pointer hover:text-black">Restaurantes</p>
                </a>
                <a href="opiniones">
                    <p class="cursor-pointer hover:text-black">Opiniones</p>
                </a>
                <a href="perfil">
                    <p class="cursor-pointer hover:text-black">Mi perfil</p>
                </a>
            </div>


            <div class="mt-10 text-black">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl sm:text-4xl uppercase">Hoteles visitados</h1>
                    <a href="{{ URL::to('hotelVisitado/create') }}">
                        <h1 class="cursor-pointer hover:text-slate-600 text-base text-right sm:text-xl uppercase"><img
                                class="w-7 mr-2 inline-block" src="{{ URL::asset('img/mas.svg') }}" />Añadir visita
                        </h1>
                    </a>
                </div>
                @if ($hotelVisitadoUsuario->count() === 0)
                    <p class="text-lg mt-2">Aún no hay ningún hotel visitado.</p>
                @else
                    @foreach ($hotelVisitadoUsuario as $hotelVisitado)
                        @if ($hotelVisitado->idUsu == Auth::user()->idUsu)
                            <div class=" bg-white my-6 shadow-lg flex-wrap justify-start">
                                <div class="grid grid-cols-2 gap-2 ml-3 relative p-6">
                                    <div>
                                        <div class="nombre mb-3">
                                            <a href="/hotelDetallado?query={{ $hotelVisitado->hotel->nombre }}">
                                                <p class="text-xl sm:text-2xl font-bold uppercase hover:underline cursor-pointer">
                                                    {{ $hotelVisitado->hotel->nombre }},
                                                    {{ $hotelVisitado->hotel->ciudad->nombre }}
                                                </p>
                                            </a>
                                        </div>
                                        <div class="fecha">
                                            <p class="text-base sm:text-lg uppercase">Fecha</p>
                                            <p class="text-sm sm:text-base">
                                                {{ date('d/m/y', strtotime($hotelVisitado->fechaEntrada)) }} -
                                                {{ date('d/m/y', strtotime($hotelVisitado->fechaSalida)) }}
                                            </p>
                                        </div>
                                        <div class="comentario mt-3">
                                            <p class="text-base sm:text-lg uppercase">Comentario</p>
                                            <p class="text-sm sm:text-base">{{ $hotelVisitado->comentario }} </p>
                                        </div>
                                    </div>
                                    <div class="valoracion mt-5 ml-3 md:mt-11">
                                        <p class="text-base sm:text-lg uppercase">Valoración</p>
                                        <p class="text-sm sm:text-base">Ubicación · {{ $hotelVisitado->punUbi }} </p>
                                        <p class="text-sm sm:text-base">Limpieza · {{ $hotelVisitado->punLim }} </p>
                                        <p class="text-sm sm:text-base">Servicio · {{ $hotelVisitado->punSer }} </p>
                                        <p class="text-sm sm:text-base">Calidad-Precio · {{ $hotelVisitado->punCalPre }} </p>
                                    </div>
                                    <div class="absolute bottom-3 md:bottom-auto md:top-3 right-6 flex flex-col justify-end mr-3 mt-3">
                                        <form action="{{ route('hotelVisitado.destroy', $hotelVisitado->idHotVis) }}"
                                            method="POST">
                                            <a href="{{ route('hotelVisitado.edit', $hotelVisitado->idHotVis) }}">
                                                <p
                                                    class="cursor-pointer text-base sm:text-lg hover:text-teal-900 text-teal-700 font-bold uppercase flex items-center justify-end">
                                                    <img class="w-7 inline-block"
                                                        src="{{ URL::asset('img/editar.svg') }}" />
                                                    &nbspEditar
                                                </p>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <td> <button type="submit" class="mt-3">
                                                    <p
                                                        class="cursor-pointer text-base sm:text-lg hover:text-red-900 text-red-600 font-bold uppercase flex items-center justify-end">
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
                    {{ $hotelVisitadoUsuario->appends(request()->query())->links() }}
                @endif
            </div>
        </div>
    </div>


</body>

</html>
