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
                <a href="hotelVisitado">
                    <p class="inline-block cursor-pointer hover:text-black" >Hoteles</p>
                </a>
                <p class="font-bold inline-block border-b-4 border-b-[#4B4B4B] pb-3 ml-6">Restaurantes</p>
                <a href="opiniones">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Opiniones</p>
                </a>
                <a href="perfil">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Mi perfil</p>
                </a>
            </div>

            <div class="flex items-center mt-10 text-black text-4xl uppercase">
                <h1>Restaurantes visitados</h1>
                
            </div>
        </div>
    </div>


</body>

</html>
