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
            <div>
                <a class="top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                    href="/hotelVisitado">
                    Ir a usuario</a>
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
                <p class="text-center">Administrador</p>
            </div>

            <div class="flex justify-center items-center text-center uppercase">
                <div class="text-2xl text-[#4B4B4B]">
                    <div class="m-4 bg-slate-500 hover:bg-slate-400 text-white hover:scale-105 py-2 px-4 rounded-lg">
                        <a href="/users/ciudades">
                            Ciudades
                        </a>
                    </div>

                    <div class="m-4 bg-slate-500 hover:bg-slate-400 text-white hover:scale-105 py-2 px-4 rounded-lg">
                        <a href="/users/hoteles">
                            Hoteles
                        </a>
                    </div>

                    <div class="m-4 bg-slate-500 hover:bg-slate-400 text-white hover:scale-105 py-2 px-4 rounded-lg">
                        <a href="/users/restaurantes">
                            Restaurantes
                        </a>
                    </div>

                    <div class="m-4 bg-slate-500 hover:bg-slate-400 text-white hover:scale-105 py-2 px-4 rounded-lg">
                        <a href="/users/ofertas">
                            Ofertas
                        </a>
                    </div>

                    <div class="m-4 bg-slate-500 hover:bg-slate-400 text-white hover:scale-105 py-2 px-4 rounded-lg">
                        <a href="/users/usuarios">
                            Usuarios
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>
