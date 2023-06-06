@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelFree</title>
    <link rel="stylesheet" href="https://unpkg.com/@splidejs/splide@3.4.9/dist/css/splide.min.css">
    <style>
        .bg-image {
            background-image: url('{{ asset('img/cabecera.jpg') }}');
        }

        .search-input {
            background-image: url('{{ asset('img/buscador.svg') }}');
            background-repeat: no-repeat;
            background-position: 10px center;
            padding-left: 40px;
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
            <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>

        <h1 class="absolute text-9xl text-white">
            <a class="cursor-pointer" href="ofertas"> TravelFree
                <img class="inline-block w-28" src="{{ URL::asset('img/logo.svg') }}" /></a>
        </h1>

    </div>

    <div class="flex items-center m-16 mb-4 text-[#727272] text-6xl uppercase font-bold">
        <h1>{{ $ciudad->nombre }}</h1>
    </div>

    <div class="flex justify-center">
        <form action="ciudad" method="GET" class="w-full max-w-sm">
            <div class="flex">
                <select id="search-input" name="query"
                    class="search-input rounded-md w-full appearance-none border-0 py-4 pl-12 pr-4 outline-none hover:bg-slate-100 focus:bg-slate-100  h-16">
                    <option value="">¿Dónde quieres ir?</option>
                    @foreach ($ciudades as $ciudades)
                        <option value="{{ $ciudades->nombre }}">{{ $ciudades->nombre }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="flex rounded-md items-center justify-center bg-slate-500 hover:bg-slate-600 text-white py-4 px-4 ml-1 ">
                    Buscar
                </button>
            </div>
        </form>
    </div>


    <div class="flex items-center justify-center mt-6 mb-10">
        <div class="relative bg-white rounded-md w-48 mx-2 hover:bg-slate-100">
            <a href="hotel?query={{ $query }}" class="flex flex-col items-start justify-end h-full p-4 text-black">
                <img class="inline-block w-10" src="{{ URL::asset('img/hotel.svg') }}" />
                <span class="text-base font-bold ml-24">HOTELES</span>
            </a>
        </div>
        <div class="relative bg-white rounded-md w-48 mx-2 hover:bg-slate-100">
            <a href="restaurante?query={{ $query }}" class="flex flex-col items-start justify-end h-full p-4 text-black">
                <img class="inline-block w-10" src="{{ URL::asset('img/restaurante.svg') }}" />
                <p class="text-base font-bold ml-12">RESTAURANTES</p>
            </a>
        </div>
    </div>


    <div class="flex justify-center">
        <div class="carousel w-2/5">
            <div class="carousel-container">
                <div class="slide">
                    <img src="{{ $ciudad->foto1 }}" alt="Imagen 1">
                </div>
                @for ($i = 2; $i <= 4; $i++)
                    @if (!empty($ciudad->{'foto' . $i}))
                        <div class="slide">
                            <img src="{{ $ciudad->{'foto' . $i} }}" alt="Imagen {{ $i }}">
                        </div>
                    @endif
                @endfor
            </div>
            @if (!empty($ciudad->foto2) || !empty($ciudad->foto3) || !empty($ciudad->foto4))
                <a class="prev" onclick="previousSlide()">&#10094;</a>
                <a class="next" onclick="nextSlide()">&#10095;</a>
            @endif
        </div>
    </div>

    <div class="flex items-center m-10 mb-3 ml-36 text-black text-3xl">
        <p>Un poco sobre</p>
        <p class="uppercase font-bold">&nbsp{{ $ciudad->nombre }} </p>
    </div>

    <div class="flex items-center m-10 mt-4 ml-36 mr-36 text-black text-xl">
        <p>[{{ $ciudad->descripcion }}]</p>
    </div>

    <div class="flex items-center m-10 text-black text-4xl uppercase">
        <h1>Hoteles destacados</h1>
    </div>

    <div class="grid grid-cols-4 gap-4 m-10">
        @foreach ($hotelesDestacados as $hotel)
            <div class="relative max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ $hotel->foto1 }}" alt="">
                <div class="absolute bottom-0 left-0 bg-black bg-opacity-20 w-full h-full"></div>
                <div class="absolute bottom-0 left-0 text-white px-2 py-1">
                    <p class="font-bold text-xl uppercase">{{ $hotel->nombre }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex items-center m-10 text-black text-4xl uppercase">
        <h1>Restaurantes destacados</h1>
    </div>

    <div class="grid grid-cols-4 gap-4 m-10">
        @foreach ($restaurantesDestacados as $restaurante)
            <div class="relative max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ $restaurante->foto1 }}" alt="">
                <div class="absolute bottom-0 left-0 bg-black bg-opacity-20 w-full h-full"></div>
                <div class="absolute bottom-0 left-0 text-white px-2 py-1">
                    <p class="font-bold text-xl uppercase">{{ $restaurante->nombre }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
