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
            <h1 class="text-4xl uppercase">Todos los usuarios</h1>
            <div class="m-4 mt-2 p-4 grid grid-cols-3 gap-2 uppercase">
                <p class="flex items-center ">Número</p>
                <p class="flex items-center ">Nombre</p>
                <p class="flex items-center">Email</p>
            </div>
            @foreach ($usuarios as $key => $usuario)
                @php
                    $numero = ($usuarios->currentPage() - 1) * $usuarios->perPage() + $key + 1;
                @endphp
                <div class="bg-white m-4 mt-2 p-4 grid grid-cols-3 gap-2 shadow">
                    <p class="flex items-center ">{{ $numero }}</p>
                    <p class="flex items-center">{{ $usuario->name }}</p>
                    <p class="flex items-center">{{ $usuario->email }}</p>
                </div>
            @endforeach
            {{ $usuarios->appends(request()->query())->links() }}

        </div>
    </div>
    </div>


</body>

</html>
