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

    <script>
        function initCarousel() {
            var carouselContainer = document.querySelector(".carousel-container");
            var slides = document.querySelectorAll(".slide");
            var currentSlide = 0;
            var slideWidth = slides[0].clientWidth;

            function showSlide(n) {
                if (n < 0) {
                    currentSlide = slides.length - 1;
                } else if (n >= slides.length) {
                    currentSlide = 0;
                } else {
                    currentSlide = n;
                }

                carouselContainer.style.transform = "translateX(-" + currentSlide * slideWidth + "px)";
            }

            function nextSlide() {
                showSlide(currentSlide + 1);
            }

            function previousSlide() {
                showSlide(currentSlide - 1);
            }

            showSlide(currentSlide);

            var prevButton = document.querySelector(".prev");
            var nextButton = document.querySelector(".next");

            prevButton.addEventListener("click", previousSlide);
            nextButton.addEventListener("click", nextSlide);
        }

        document.addEventListener("DOMContentLoaded", function() {
            initCarousel();
        });
    </script>

</head>

<body class="bg-[#ECECEC]">


    <div class="grid place-items-center h-60 bg-image bg-cover">
        <div class="absolute inset-0 bg-black opacity-40 h-60"></div>
        <div>
             @if (Auth::check())
                <div>
                    <a class="cursor-pointer" href="hotelVisitado"><img class="absolute m-6 left-0 top-0 w-10"
                            src="{{ URL::asset('img/user.png') }}">
                        <p class="absolute m-8 left-10 top-0 w-40 text-lg text-white hover:underline">{{ Auth::user()->name }}</p>
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
        <a href="hotel?query={{ $hotel->ciudad->nombre }}" class="text-sm hover:underline"><img
                class="inline-block w-5 mr-2" src="{{ URL::asset('img/volver.svg') }}" />Hoteles en
            {{ $hotel->ciudad->nombre }}</a>
    </div>


    <div class="m-10 mt-5 mb-3 text-black">
        <p class="uppercase text-4xl">{{ $hotel->nombre }}</p>
        <p class="mt-2 text-lg">
            @if ($numeroComentarios == 1)
                <p>{{ $numeroComentarios }} opinión</p>
            @else
                <p>{{ $numeroComentarios }} opiniones</p>
            @endif
        </p>
        <p class="text-lg"><img class="inline-block w-5" src="{{ URL::asset('img/ubicacion.svg') }}" />
            {{ $hotel->direccion }}, {{ $hotel->ciudad->nombre }}, {{ $hotel->ciudad->pais }}</p>
    </div>

    <div class="flex justify-center">
        <div class="carousel w-2/5 mt-2">
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

    <div class="flex mx-10 my-6">
        <div class="w-2/4 p-4  bg-white mr-10 ">
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
                            value="{{ $sumaUbi / $numeroComentarios }}" max="10"></progress>
                        {{ number_format($sumaUbi / $numeroComentarios, 1) }} · Ubicación</p>
                    <p class="py-4 mx-4"><progress class="custom-progress mr-1"
                            value="{{ $sumaLim / $numeroComentarios }}" max="10"></progress>
                        {{ number_format($sumaLim / $numeroComentarios, 1) }} · Limpieza</p>
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
        <div class="w-2/4 p-4 bg-white ">
            <div class="w-full rounded-md mb-6">
                <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400">Información</p>
            </div>
            <div class="ml-4">
                <p class="text-xl">{{ $hotel->descripcion }}</p>
            </div>
            <div class="w-full rounded-md mb-6">
                <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400 mb-">Precio por noche</p>
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


    <div class="mx-10 mb-10 p-4 bg-white ">
        <div class="w-full h-16 rounded-md mb-6">
            <p class="text-2xl uppercase py-4 mx-4 border-b border-b-slate-400">Opiniones</p>
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
                <p class="text-xl"> Aún no hay opiniones. </p>
            </div>
        @endif
    </div>

</body>

</html>
