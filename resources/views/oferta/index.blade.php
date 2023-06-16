@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelFree</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="{{ asset('js/animacion.js') }}"></script>


</head>

<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <svg width="25.30757mm" height="25.30757mm" viewBox="0 0 158.30757 158.30757" version="1.1" id="svg5"
                xml:space="preserve" inkscape:version="1.2.2 (732a01da63, 2022-12-09)" sodipodi:docname="logo.svg"
                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                xmlns:svg="http://www.w3.org/2000/svg">
                <sodipodi:namedview id="namedview7" pagecolor="#ffffff" bordercolor="#000000" borderopacity="0.25"
                    inkscape:showpageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0"
                    inkscape:deskcolor="#d1d1d1" inkscape:document-units="mm" showgrid="false"
                    inkscape:zoom="0.70199214" inkscape:cx="92.593629" inkscape:cy="331.91255"
                    inkscape:window-width="1920" inkscape:window-height="986" inkscape:window-x="-11"
                    inkscape:window-y="-11" inkscape:window-maximized="1" inkscape:current-layer="layer1" />
                <defs id="defs2" />
                <g inkscape:label="Capa 1" inkscape:groupmode="layer" id="layer1"
                    transform="translate(-25.846214,-69.346214)">

                    <path id="fondo" style="fill:#26baf1;fill-opacity:1;stroke-width:1.338"
                        d="M 105.00004 69.346214 A 79.153786 79.153786 0 0 0 32.171409 117.58978 L 177.86433 117.58978 A 79.153786 79.153786 0 0 0 105.00004 69.346214 z M 30.414411 122.1125 A 79.153786 79.153786 0 0 0 25.846214 148.50004 A 79.153786 79.153786 0 0 0 29.871291 173.37966 L 180.12879 173.37966 A 79.153786 79.153786 0 0 0 184.15386 148.50004 A 79.153786 79.153786 0 0 0 179.62236 122.1125 L 30.414411 122.1125 z M 31.518736 177.90238 A 79.153786 79.153786 0 0 0 105.00004 227.65386 A 79.153786 79.153786 0 0 0 178.48134 177.90238 L 31.518736 177.90238 z "
                        inkscape:label="bgCirculo" />

                    <path sodipodi:type="spiral"
                        style="fill:none;fill-rule:evenodd;stroke:#000000;stroke-width:0.264583" id="espiral1"
                        sodipodi:cx="53.897205" sodipodi:cy="92.34137" sodipodi:expansion="1" sodipodi:revolution="3"
                        sodipodi:radius="82.620148" sodipodi:argument="-17.836391" sodipodi:t0="0"
                        d="m 53.897205,92.34137 c 2.192091,3.514906 -3.656524,4.689025 -5.842006,3.643399 -5.922522,-2.833584 -5.07251,-11.063842 -1.444792,-15.327412 6.489137,-7.626527 18.359754,-5.944707 24.812817,0.753816 9.470131,9.830351 6.867836,25.763707 -2.952423,34.298217 -13.08886,11.37518 -33.207193,7.81418 -43.783627,-5.15103 C 11.377811,94.242982 15.914358,69.888546 32.036811,57.289332 51.563262,42.029994 80.18009,47.550687 94.79125,66.837577 112.01,89.566508 105.50024,122.46108 83.044397,139.07742 57.118236,158.26164 19.936154,150.75978 1.3191483,125.13196 -19.834676,96.012008 -11.338677,54.535809 17.463215,33.921306 49.774585,10.79495 95.549585,20.286485 118.15928,52.26398 143.26032,87.765062 132.77223,137.8423 97.617994,162.44545"
                        transform="matrix(1.0000024,0,0,0.99733505,44.252258,56.780377)" />

                    <path sodipodi:type="spiral"
                        style="fill:none;fill-rule:evenodd;stroke:#ffffff;stroke-width:0.264583;stroke-opacity:1"
                        id="espiral2" sodipodi:cx="53.897205" sodipodi:cy="92.34137" sodipodi:expansion="1"
                        sodipodi:revolution="3" sodipodi:radius="82.620148" sodipodi:argument="-17.836391"
                        sodipodi:t0="0"
                        d="m 53.897205,92.34137 c 2.192091,3.514906 -3.656524,4.689025 -5.842006,3.643399 -5.922522,-2.833584 -5.07251,-11.063842 -1.444792,-15.327412 6.489137,-7.626527 18.359754,-5.944707 24.812817,0.753816 9.470131,9.830351 6.867836,25.763707 -2.952423,34.298217 -13.08886,11.37518 -33.207193,7.81418 -43.783627,-5.15103 C 11.377811,94.242982 15.914358,69.888546 32.036811,57.289332 51.563262,42.029994 80.18009,47.550687 94.79125,66.837577 112.01,89.566508 105.50024,122.46108 83.044397,139.07742 57.118236,158.26164 19.936154,150.75978 1.3191483,125.13196 -19.834676,96.012008 -11.338677,54.535809 17.463215,33.921306 49.774585,10.79495 95.549585,20.286485 118.15928,52.26398 143.26032,87.765062 132.77223,137.8423 97.617994,162.44545"
                        transform="matrix(1.0000024,0,0,0.99733505,46.152353,58.569292)" />
                    <image width="127.26779" height="75.36631" preserveAspectRatio="none"
                        xlink:href="data:image/png;base64,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"
                        id="imagen" x="31.566612" y="110.81684" />
                </g>
            </svg>
        </h1>
    </div>


    <div id="contenedorBusc">
        <div id="buscador">
            <form action="ciudad" method="GET">
                <div id="buscadorSel">
                    <input type="text" id="mysearch" class="search-input translationText"
                        data-translation-key="search" name="query" placeholder="¿A qué ciudad quieres ir?">
                    <button type="submit" data-translation-key="search" class="translationText"
                        id="buscar">Buscar</button>
                </div>
                <ul id="showlist" tabindex='1' class="list-group"></ul>

            </form>

        </div>
    </div>


    <div id="recents" data-translation-key="recents" class="subtitulo translationText">
        <h1>Búsquedas recientes</h1>
    </div>

        <div id="recientes"></div>

    

    <div data-translation-key="destacadas" class="subtitulo translationText">
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


    <div data-translation-key="ofertas" class="subtitulo translationText">
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


    <button class="traducir" id="EnglishButton">English</button>
    <button class="traducir" id="SpanishButton">Español</button>

    <script src="{{ asset('js/buscador.js') }}" type="module"></script>
    <script src="{{ asset('js/localRecientes.js') }}" type="module"></script>





</body>

</html>
