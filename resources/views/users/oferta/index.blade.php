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
            <h1 class="text-4xl uppercase">Todas las ofertas</h1>
            <div class="m-4 mt-2 p-4 grid grid-cols-5 gap-2 uppercase">
                <p class="flex items-center ">Número</p>
                <p class="flex items-center">Precio oferta</p>
                <p class="flex items-center">Fecha fin</p>
                <p class="flex items-center">Id hotel</p>
                <a href="{{ route('users.oferta.create') }}">
                    <h1 class="text-right cursor-pointer hover:text-slate-600 uppercase"><img
                            class="w-7 mr-2 inline-block" src="{{ URL::asset('img/mas.svg') }}" />Añadir</h1>
                </a>
            </div>
            @foreach ($ofertas as $key => $oferta)
                <div class="bg-white m-4 mt-2 p-4 grid grid-cols-5 gap-2 shadow">
                    <p class="flex items-center ">{{ $key + 1 }}</p>
                    <p class="flex items-center">{{ $oferta->precioOferta }}</p>
                    <p class="flex items-center">{{ $oferta->fechaFin }}</p>
                    <p class="flex items-center">{{ $oferta->idHotel }}</p>
                    <div
                        style="display: flex; align-content: flex-end; flex-direction: column; justify-content: center; flex-wrap: wrap;">
                        <a href="{{ route('users.oferta.edit', $oferta) }}">
                            <p class="mr-1 mb-1 hover:text-teal-900 text-teal-700 uppercase font-bold cursor-pointer">
                                <img class="w-7 inline-block" src="{{ URL::asset('img/editar.svg') }}" /> Editar
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    </div>


</body>

</html>
