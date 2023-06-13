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
            <h1 class="text-4xl uppercase">Todos los restaurantes</h1>
            <div class="m-4 mt-2 p-4 grid grid-cols-10 gap-2 uppercase">
                <p class="flex items-center ">Número</p>
                <p class="flex items-center">Nombre</p>
                <p class="flex items-center">Dirección</p>
                <p class="flex items-center">Teléfono</p>
                <p class="flex items-center">Tipo cocina</p>
                <p class="flex items-center">Descripción</p>
                <p class="flex items-center">Precio</p>
                <p class="flex items-center">Fotos</p>
                <p class="flex items-center">Id ciudad</p>
                <a href="{{ route('restaurante.create') }}">
                    <h1 class="text-right cursor-pointer hover:text-slate-600 uppercase"><img
                            class="w-7 mr-2 inline-block" src="{{ URL::asset('img/mas.svg') }}" />Añadir
                    </h1>
                </a>
            </div>
            @foreach ($restaurantes as $key => $restaurante)
                @php
                    $numero = ($restaurantes->currentPage() - 1) * $restaurantes->perPage() + $key + 1;
                @endphp
                <div class="bg-white m-4 mt-2 p-4 grid grid-cols-10 gap-2 shadow">
                    <p class="flex items-center ">{{ $numero }}</p>
                    <p class="flex items-center">{{ $restaurante->nombre }}</p>
                    <p class="flex items-center">{{ $restaurante->direccion }}</p>
                    <p class="flex items-center">{{ $restaurante->telefono }}</p>
                    <p class="flex items-center">{{ $restaurante->tipoCocina }}</p>
                    <p class="flex items-center">{{ $restaurante->descripcion }}</p>
                    <p class="flex items-center">{{ $restaurante->precio }}</p>
                    <div class="grid-span-2 " style="display:flex; flex-wrap: wrap; align-content: center;">
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            {{ $restaurante->foto1 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            {{ $restaurante->foto2 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            {{ $restaurante->foto3 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            {{ $restaurante->foto4 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            {{ $restaurante->foto5 }}
                        </p>
                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                            {{ $restaurante->foto6 }}
                        </p>
                    </div>
                    <p class="flex items-center">{{ $restaurante->idCiudad }}</p>
                    <div
                        style="display: flex; align-content: flex-end; flex-direction: column; justify-content: center; flex-wrap: wrap;">

                        <a href="{{ route('users.restaurante.edit', $restaurante) }}">
                            <p class="mr-1 mb-1 hover:text-teal-900 text-teal-700 uppercase font-bold cursor-pointer">
                                <img class="w-7 inline-block" src="{{ URL::asset('img/editar.svg') }}" /> Editar
                            </p>
                        </a>


                    </div>
                </div>
            @endforeach
            {{ $restaurantes->appends(request()->query())->links() }}

        </div>
    </div>
    </div>


</body>

</html>
