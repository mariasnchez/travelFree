@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelFree</title>

</head>

<body>


    <div id="bg-video">
        <video autoplay muted loop>
            <source src="{{ asset('video/trailer2.mp4') }}" type="video/mp4">
        </video>

        <div id="capa"></div>

        <div>
            @if (Auth::check())
                <div>
                    <div id="usuario">
                        <a href="hotelVisitado"><img src="{{ URL::asset('img/user.png') }}">
                            <p> {{ Auth::user()->name }}</p>
                        </a>
                    </div>
                    <div id="logout">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a id="login" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif



        </div>
        <h1 id="titulo">
            TravelFree
            <img  src="{{ URL::asset('img/logo.svg') }}" />
        </h1>
    </div>

    <div id="contenedorBusc">
        <div id="buscador">
            <form action="ciudad" method="GET" >
                <div id="buscadorSel">
                    <select id="search-input" class="search-input" name="query">
                        <option value="">¿Dónde quieres ir?</option>
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->nombre }}">{{ $ciudad->nombre }}</option>
                        @endforeach
                    </select>
                    <button type="submit" id="buscar">
                        Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div class="subtitulo">
        <h1>Búsquedas recientes</h1>
    </div>


    <div class="subtitulo">
        <h1>Ciudades destacadas</h1>
    </div>

    <div id="ciudades">
        @foreach ($ciudades as $key => $ciudad)
            @if ($key < 4)
                <a href="/ciudad?query={{ $ciudad->nombre }}">
                    <div id="ciudad">
                        <img src="{{ $ciudad->foto1 }}" alt="">
                        <div id="capaCiudad">
                        </div>
                        <div id="textoCiudad">
                            <p id="nombreCiudad">{{ $ciudad->nombre }}</p>
                            <p id="paisCiudad">{{ $ciudad->pais }}</p>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>


    <div class="subtitulo">
        <h1>Las mejores ofertas en el momento</h1>
    </div>

    <div id="ofertas">
        @php
            $randomOfertas = $oferta->shuffle()->take(6);
        @endphp

        @foreach ($randomOfertas as $oferta)
            <a href="/hotelDetallado?query={{ $oferta->hotel->nombre }}">
                <div id="oferta">
                    <img src="{{ $oferta->hotel->foto1 }}" alt="">
                    <div id="capaOferta">
                    </div>
                    <div id="texto">
                        <p id="hotelOferta">{{ $oferta->hotel->nombre }}</p>
                        <p id="ciudadOferta">{{ $oferta->hotel->ciudad->nombre }}</p>
                    </div>
                    <div id="precio">
                        <p id="hotelPrecio">{{ $oferta->hotel->precio }}€</p>
                        <p id="precioOferta">{{ $oferta->precioOferta }}€</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>




</body>

</html>
