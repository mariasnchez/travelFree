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
    <div class="grid place-items-center h-60 bg-image bg-cover">
        <div class="absolute inset-0 bg-black opacity-40 h-60"></div>
        <div>
            <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>

        <h1 class="absolute text-9xl text-white">
            <a class="cursor-pointer" href="ofertas"> TravelFree
                <img class="inline-block w-28" src="{{ URL::asset('img/logo.svg') }}" /></a>
        </h1>

    </div>


    <div class="flex items-center m-10 mb-3 text-black text-3xl">
        <p>{{ $total }} hoteles en </p>
        <p class="uppercase font-bold">&nbsp{{ $ciudad->nombre }} </p>
    </div>

    <div class="flex mx-10">
        <div class="w-1/4 p-4">
            <div class="w-full h-16 bg-white rounded-md mb-4">
                <p class="text-center"> filtros </p>
            </div>
        </div>
        <div class="w-3/4">
            <div class="grid grid-cols-1 gap-4 p-4">
                @foreach ($hoteles as $i => $hotel)
                    <div class="bg-white rounded-md p-4 h-40 flex relative">
                        <div class="flex flex-col flex-grow">
                            <p class="font-bold text-xl uppercase">{{ $i + 1 }}. {{ $hotel->nombre }}</p>
                            <p class="text-sm">{{ $hotel->direccion }}</p>
                            <div class="absolute bottom-4 left-4">
                                <p class="text-2xl text-white rounded-lg bg-slate-400 p-1 w-fit">
                                    {{ number_format($hotel->media, 1) }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col-reverse">
                            <div class=" mr-4">
                                @if ($hotel->ofertas->count() > 0)
                                    <div class="bg-cyan-500 text-white p-2 w-fit">Oferta disponible</div>
                                @endif
                            </div>
                            <div class="mt-auto mr-4 text-right">
                                <span class="font-bold text-xl">{{ $hotel->precio }}€</span>
                                <span class="text-sm">/noche</span>
                            </div>
                        </div>

                        <img src="{{ $hotel->foto1 }}" alt="Imagen 1" class="ml-auto h-40 -mt-4 -mr-4 ">
                    </div>
                @endforeach
            </div>
        </div>


    </div>

</body>

</html>
