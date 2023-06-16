@extends('layouts.app')



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelFree</title>
</head>

<body class="bg-[#ECECEC] contenedor">
    <div class="m-10">
        <div class="mb-4 flex justify-between items-center">
            <a class="cursor-pointer" href="/ofertas"><img class="inline-block w-16"
                    src="{{ URL::asset('img/logo.svg') }}" /></a>
        </div>
        <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
        </div>
        <div class="container m-10">
            <div class=" mt-6 text-black">
                <a href="/users" class="text-lg hover:underline"><img class="inline-block w-5 mr-2"
                        src="{{ URL::asset('img/volver.svg') }}" />Volver</a>
            </div>
        </div>

        <div class=" items-center m-10 mt-0">
            <h1 class="text-4xl uppercase">Todos los hoteles</h1>
            <div class="m-4 mt-2 p-4 sm:grid grid-cols-8 gap-3 uppercase">
                <p class="flex items-center ">Número</p>
                <p class="flex items-center">Nombre</p>
                <p class="flex items-center">Dirección</p>
                <p class="flex items-center">Descripción</p>
                <p class="flex items-center">Precio</p>
                <p class="flex items-center">Fotos</p>
                <p class="flex items-center">Id ciudad</p>
                <a href="{{ route('hotel.create') }}">
                    <h1 class="text-right cursor-pointer hover:text-slate-600 uppercase"><img
                            class="w-7 mr-2 inline-block" src="{{ URL::asset('img/mas.svg') }}" />Añadir</h1>
                </a>
            </div>
            @foreach ($hoteles as $key => $hotel)
                @php
                    $numero = ($hoteles->currentPage() - 1) * $hoteles->perPage() + $key + 1;
                @endphp
                <div class="bg-white m-4 mt-2 p-4 sm:grid grid-cols-8 gap-3 shadow">
                    <p class="flex items-center ">{{ $numero }}</p>
                    <p class="flex items-center">{{ $hotel->nombre }}</p>
                    <p class="flex items-center">{{ $hotel->direccion }}</p>
                    <p class="flex items-center">{{ $hotel->descripcion }}</p>
                    <p class="flex items-center">{{ $hotel->precio }}</p>
                    <div class="grid-span-2 " style="display:flex; flex-wrap: wrap; align-content: center;">
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $hotel->foto1 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $hotel->foto2 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $hotel->foto3 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $hotel->foto4 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $hotel->foto5 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $hotel->foto6 }}
                        </p>
                    </div>
                    <p class="flex items-center">{{ $hotel->idCiudad }}</p>
                    <div
                        style="display: flex; align-content: flex-end; flex-direction: column; justify-content: center; flex-wrap: wrap;">
                        <a href="{{ route('users.hotel.edit', $hotel) }}">
                            <p class="mr-1 mb-1 hover:text-teal-900 text-teal-700 uppercase font-bold cursor-pointer">
                                <img class="w-7 inline-block" src="{{ URL::asset('img/editar.svg') }}" /> Editar
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
            {{ $hoteles->appends(request()->query())->links() }}

        </div>
    </div>
    </div>


</body>

</html>
