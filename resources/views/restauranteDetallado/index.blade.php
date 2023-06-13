@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelFree</title>
    <style>
        .bg-image {
            background-image: url('{{ asset('img/cabecera.jpg') }}');
        }

        .carousel {
            position: relative;
            overflow: hidden;
        }

        .carousel img {
            width: 100%;
            height: auto;
        }

        .carousel-container {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slide {
            flex: 0 0 100%;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            padding: 10px;
            color: white;
            background-color: rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .prev {
            left: 2px;
        }

        .next {
            right: 2px;
        }

        .custom-progress {
            border-radius: 10px;
        }

        .custom-progress::-webkit-progress-bar {
            background-color: #ccd2d9;
            border-radius: 10px;
        }

        .custom-progress::-webkit-progress-value {
            background-color: #007bff;
            border-radius: 10px;
        }

        .custom-progress::-moz-progress-bar {
            background-color: #007bff;
            border-radius: 10px;
        }
    </style>

    <script src="{{ asset('js/carrusel.js') }}"></script>

</head>

<body class="bg-[#ECECEC]">


    <div class="grid place-items-center h-60 bg-image bg-cover">
        <div class="absolute inset-0 bg-black opacity-40 h-60"></div>
        <div>
            @if (Auth::check())
                <div>
                    <a class="cursor-pointer" href="hotelVisitado"><img class="absolute m-6 left-0 top-0 w-10"
                            src="{{ URL::asset('img/user.png') }}">
                        <p class="absolute m-8 left-10 top-0 w-40 text-lg text-white hover:underline">
                            {{ Auth::user()->name }}</p>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="absolute m-6 top-0 right-0">
                        @csrf
                        <button type="submit"
                            class="bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>
            @else
                <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
        </div>

        <h1 class="absolute text-9xl text-white">
            <a class="cursor-pointer" href="ofertas"> TravelFree
                <img class="inline-block w-28" src="{{ URL::asset('img/logo.svg') }}" /></a>
        </h1>
    </div>

    <div class=" ml-6 mt-6 text-black">
        <a href="restaurante?query={{ $restaurante->ciudad->nombre }}" class="text-sm hover:underline"><img
                class="inline-block w-5 mr-2" src="{{ URL::asset('img/volver.svg') }}" />Restaurantes en
            {{ $restaurante->ciudad->nombre }}</a>
    </div>


    <div class="m-10 mt-5 mb-3 text-black">
        <p class="uppercase text-4xl">{{ $restaurante->nombre }}</p>
        <span class="mt-2 pr-2 text-lg border border-r-slate-500">
            @if ($numeroComentarios == 1)
                <span>{{ $numeroComentarios }} opinión</span>
            @else
                <span>{{ $numeroComentarios }} opiniones</span>
            @endif
        </span>
        <span class="px-3 text-lg border border-r-slate-500"> {{ $restaurante->precio }}</span>
        <span class="px-2 text-lg"> {{ $restaurante->tipoCocina }}</span>
        <p class="text-lg"><img class="inline-block w-5" src="{{ URL::asset('img/ubicacion.svg') }}" />
            {{ $restaurante->direccion }}, {{ $restaurante->ciudad->nombre }}, {{ $restaurante->ciudad->pais }}</p>
        <p class="text-lg"><img class="inline-block w-5" src="{{ URL::asset('img/telefono.svg') }}" />
            {{ $restaurante->telefono }}</p>
    </div>

    <div class="flex justify-center">
        <div class="carousel w-2/5 mt-2">
            <div class="carousel-container">
                <div class="slide">
                    <img src="{{ $restaurante->foto1 }}" alt="Imagen 1">
                </div>
                @for ($i = 2; $i <= 6; $i++)
                    @if (!empty($restaurante->{'foto' . $i}))
                        <div class="slide">
                            <img src="{{ $restaurante->{'foto' . $i} }}" alt="Imagen {{ $i }}">
                        </div>
                    @endif
                @endfor
            </div>
            @if (
                !empty($restaurante->foto2) ||
                    !empty($restaurante->foto3) ||
                    !empty($restaurante->foto4) ||
                    !empty($restaurante->foto5) ||
                    !empty($restaurante->foto6))
                <a class="prev" onclick="previousSlide()">&#10094;</a>
                <a class="next" onclick="nextSlide()">&#10095;</a>
            @endif
        </div>
    </div>

    <div class="flex mx-10 my-6">
        <div class="w-1/3 p-4  bg-white mr-10 ">
            <div class="w-full h-16rounded-md mb-6">
                <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400">Puntuación</p>
            </div>
            @if ($numeroComentarios == 0)
                <div class="ml-4">
                    <p class="text-xl">Aún no hay valoraciones.</p>
                </div>
            @else
                <div class="ml-4">
                    <span class="text-2xl text-white rounded-lg bg-slate-400 p-2 pr-1 w-fit mr-2">
                        {{ $mediaRedondeada }}
                    </span>
                    @if ($mediaRedondeada < 5)
                        <span class="text-xl">Malo</span>
                    @elseif($mediaRedondeada >= 5 && $mediaRedondeada < 7)
                        <span class="text-xl">Aceptable</span>
                    @elseif($mediaRedondeada >= 7 && $mediaRedondeada < 8)
                        <span class="text-xl">Genial</span>
                    @elseif($mediaRedondeada >= 8 && $mediaRedondeada < 9)
                        <span class="text-xl">Fantástico</span>
                    @elseif($mediaRedondeada >= 9)
                        <span class="text-xl">Excelente</span>
                    @endif
                </div>
                <div class="text-xl mt-4">
                    <p class="py-4 mx-4"><progress class="custom-progress mr-1"
                            value="{{ $sumaCom / $numeroComentarios }}" max="10"></progress>
                        {{ number_format($sumaCom / $numeroComentarios, 1) }} · Comida</p>
                    <p class="py-4 mx-4"><progress class="custom-progress mr-1"
                            value="{{ $sumaSer / $numeroComentarios }}" max="10"></progress>
                        {{ number_format($sumaSer / $numeroComentarios, 1) }} · Servicio</p>
                    <p class="py-4 mx-4"><progress class="custom-progress mr-1"
                            value="{{ $sumaCalPre / $numeroComentarios }}" max="10"></progress>
                        {{ number_format($sumaCalPre / $numeroComentarios, 1) }} · Calidad-Precio
                    </p>
                </div>

            @endif
        </div>
        <div class="w-1/3 p-4 bg-white  mr-10">
            <div class="w-full h-16 rounded-md mb-6">
                <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400">Información</p>
            </div>
            <div class="ml-4">
                <p class="text-xl">{{ $restaurante->descripcion }}</p>
            </div>
        </div>
        <div class="w-1/3 p-4 bg-white ">
            <div class="w-full h-16 rounded-md mb-6">
                <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400">Detalles</p>
            </div>
            <div class="ml-4">
                <p class="text-lg font-bold uppercase">Rango de precios</p>
                @if ($restaurante->precio == '€')
                    <p class="text-lg">Menos de 10€</p>
                @elseif($restaurante->precio == '€€')
                    <p class="text-lg">Entre 10€ y 20€</p>
                @elseif($restaurante->precio == '€€€')
                    <p class="text-lg">Entre 20€ y 30€</p>
                @elseif($restaurante->precio == '€€€€')
                    <p class="text-lg">Más de 30€</p>
                @endif
                <p class="text-xs">*Por persona</p>
            </div>
            <div class="ml-4 mt-4">
                <p class="text-lg font-bold uppercase">Tipo de comida</p>
                <p class="text-lg">{{ $restaurante->tipoCocina }}</p>
            </div>
        </div>
    </div>


    <div class="mx-10 mb-10 p-4 bg-white ">
        <div class="w-full h-16 rounded-md mb-6">
            <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400">Opiniones</p>
        </div>
        @if ($numeroComentarios > 0)
            @foreach ($restauranteVisitado as $visitado)
                <div class="w-full h-16 rounded-md mb-6">
                    <div class="mx-4">
                        <p class="text-xl"><img class="inline-block w-12 mr-2"
                                src="{{ URL::asset('img/user.svg') }}" />{{ $visitado->usuario->name }}</p>
                        <p class="text-lg ml-16">{{ $visitado->comentario }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <div class="mx-4 mb-4">
                <p class="text-xl"> Aún no hay opiniones. </p>
            </div>
    </div>
    @endif
</body>

</html>
