@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelFree</title>

    <script src="{{ asset('js/carruselSinSonido.js') }}"></script>

</head>

<body class="bg-[#ECECEC]">

    <div class="contenedor">

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

            <h1 class="absolute text-5xl text-white md:text-6xl lg:text-7xl xl:text-9xl">
                <a class="cursor-pointer font-bold" href="ofertas"> TravelFree
                    <img class="inline-block w-16 md:w-20 lg:w-28" src="{{ URL::asset('img/logo.svg') }}" /></a>
            </h1>
        </div>

        <div class=" ml-6 mt-6 text-black">
            <a href="hotel?query={{ $hotel->ciudad->nombre }}" class="text-sm hover:underline"><img
                    class="inline-block w-5 mr-2" src="{{ URL::asset('img/volver.svg') }}" />
                <p class="inline-block translationText capitalize hover:underline" data-translation-key="hotelesEn">
                    Hoteles
                    en</p>
                {{ $hotel->ciudad->nombre }}
            </a>
        </div>


        <div class="m-10 mt-5 mb-3 text-black">
            <p class="uppercase text-4xl">{{ $hotel->nombre }}</p>
            <p class="mt-2 text-lg">
                @if ($numeroComentarios == 1)
                    <p>{{ $numeroComentarios }} opinion</p>
                @else
                    <p class="inline-block">{{ $numeroComentarios }}</p>
                    <p class="translationText inline-block" data-translation-key="opiniones">&nbspopiniones</p>
                @endif
            </p>
            <p class="text-lg"><img class="inline-block w-5" src="{{ URL::asset('img/ubicacion.svg') }}" />
                {{ $hotel->direccion }}, {{ $hotel->ciudad->nombre }}, {{ $hotel->ciudad->pais }}</p>
        </div>

        <div class="flex justify-center">
            <div class="carousel mx-4 md:w-2/5 mt-2">
                <div class="carousel-container">
                    <div class="slide">
                        <img src="{{ $hotel->foto1 }}" alt="Imagen 1">
                    </div>
                    @for ($i = 2; $i <= 6; $i++)
                        @if (!empty($hotel->{'foto' . $i}))
                            <div class="slide">
                                <img src="{{ $hotel->{'foto' . $i} }}" alt="Imagen {{ $i }}">
                            </div>
                        @endif
                    @endfor
                </div>
                @if (
                    !empty($hotel->foto2) ||
                        !empty($hotel->foto3) ||
                        !empty($hotel->foto4) ||
                        !empty($hotel->foto5) ||
                        !empty($hotel->foto6))
                    <a class="prev" onclick="previousSlide()">&#10094;</a>
                    <a class="next" onclick="nextSlide()">&#10095;</a>
                @endif
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:mx-10">
            <div class="p-4  bg-white mx-10 mt-10 md:mb-10">
                <div class="w-full h-16rounded-md mb-6">
                    <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400 translationText"
                        data-translation-key="puntuacion">
                        Puntuación</p>
                </div>
                @if ($numeroComentarios == 0)
                    <div class="ml-4">
                        <p class="text-xl translationText" data-translation-key="valoraciones">Aún no hay valoraciones.
                        </p>
                    </div>
                @else
                    <div class="ml-4">
                        <span class="text-2xl text-white rounded-lg bg-slate-400 p-2 pr-1 w-fit mr-2">
                            {{ $mediaRedondeada }}
                        </span>
                        @if ($mediaRedondeada < 5)
                            <span class="text-xl translationText" data-translation-key="malo">Malo</span>
                        @elseif($mediaRedondeada >= 5 && $mediaRedondeada < 7)
                            <span class="text-xl translationText" data-translation-key="aceptable">Aceptable</span>
                        @elseif($mediaRedondeada >= 7 && $mediaRedondeada < 8)
                            <span class="text-xl translationText" data-translation-key="genial">Genial</span>
                        @elseif($mediaRedondeada >= 8 && $mediaRedondeada < 9)
                            <span class="text-xl translationText" data-translation-key="fantastico">Fantástico</span>
                        @elseif($mediaRedondeada >= 9)
                            <span class="text-xl translationText" data-translation-key="excelente">Excelente</span>
                        @endif
                    </div>
                    <div class="text-xl mt-4">
                        <p class="py-4 ml-4 mr-1 inline-block"><progress class="custom-progress mr-1"
                                value="{{ $sumaUbi / $numeroComentarios }}" max="10"></progress>
                            {{ number_format($sumaUbi / $numeroComentarios, 1) }} ·
                        <p class="inline-block translationText" data-translation-key="ubicacion">Ubicación</p>
                        </p>
                        <p class="py-4 ml-4 mr-1 inline-block"><progress class="custom-progress mr-1 "
                                value="{{ $sumaLim / $numeroComentarios }}" max="10"></progress>
                            {{ number_format($sumaLim / $numeroComentarios, 1) }} ·
                        <p class="inline-block translationText" data-translation-key="limpieza">Limpieza</p>
                        </p>
                        <p class="py-4 ml-4 mr-1 inline-block"><progress class="custom-progress mr-1"
                                value="{{ $sumaSer / $numeroComentarios }}" max="10"></progress>
                            {{ number_format($sumaSer / $numeroComentarios, 1) }} ·
                        <p class="inline-block translationText" data-translation-key="servicio">Servicio</p>
                        </p>
                        <p class="py-4 ml-4 mr-1 inline-block"><progress class="custom-progress mr-1"
                                value="{{ $sumaCalPre / $numeroComentarios }}" max="10"></progress>
                            {{ number_format($sumaCalPre / $numeroComentarios, 1) }} ·
                        <p class="inline-block translationText" data-translation-key="calPre">Calidad-Precio</p>
                        </p>
                    </div>

                @endif
            </div>
            <div class="p-4 bg-white m-10 ">
                <div class="w-full rounded-md mb-6">
                    <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400 translationText"
                        data-translation-key="info">Información</p>
                </div>
                <div class="ml-4">
                    <p class="text-xl">{{ $hotel->descripcion }}</p>
                </div>
                <div class="w-full rounded-md mb-6">
                    <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400 translationText"
                        data-translation-key="precioN">Precio por noche</p>
                    <div class="ml-4 mt-4">
                        @if ($hotel->ofertas->count() > 0)
                            <span class="text-lg line-through">{{ $hotel->precio }}€ </span><span
                                class="text-3xl font-bold text-green-700">&nbsp{{ $hotel->ofertas[0]->precioOferta }}€</span>
                        @else
                            <span class="text-2xl font-bold">{{ $hotel->precio }}€</span>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="mx-10 mb-10 p-4 bg-white ">
        <div class="w-full h-16 rounded-md mb-6">
            <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400 translationText"
                data-translation-key="opiniones">Opiniones</p>
        </div>
        @if ($numeroComentarios > 0)
            @foreach ($hotelVisitado as $visitado)
                <div class="mx-4 mb-4">
                    <p class="text-xl"><img class="inline-block w-12 mr-2"
                            src="{{ URL::asset('img/user.svg') }}" />{{ $visitado->usuario->name }}</p>
                    <p class="text-lg ml-16">{{ $visitado->comentario }}</p>
                </div>
            @endforeach
        @else
            <div class="mx-4 mb-4">
                <p class="text-xl translationText" data-translation-key="aunNo"> Aún no hay opiniones. </p>
            </div>
        @endif
    </div>
    <div class="botones">
        <img src="{{ URL::asset('img/ukflag.svg') }}"> <button class="traducir" id="EnglishButton">English</button>
        <img src="{{ URL::asset('img/spainflag.svg') }}"><button class="traducir"
            id="SpanishButton">Español</button>
    </div>
    </div>
</body>

</html>
