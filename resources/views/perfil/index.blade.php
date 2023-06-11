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
                    <p class="inline-block cursor-pointer hover:text-black">Hoteles</p>
                </a>
                <a href="restauranteVisitado">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Restaurantes</p>
                </a>
                <a href="opiniones">
                    <p class="inline-block ml-6 cursor-pointer hover:text-black">Opiniones</p>
                </a>
                <p class="font-bold inline-block border-b-4 border-b-[#4B4B4B] pb-3 ml-6">Mi perfil</p>

            </div>

            <div class="mt-10 text-black">
                <div class="flex justify-between items-center">
                    <h1 class="text-4xl uppercase">Tu perfil</h1>
                    <div class="ml-2 relative">
                        <button class="text-gray-600 hover:text-black focus:outline-none">
                            <img class="w-8 mr-10" src="{{ URL::asset('img/ajustes.svg') }}" />
                        </button>
                        <div class="absolute right-0 mt-2 mr-10 w-40 bg-white border border-gray-200 rounded shadow-md hidden"
                            style="z-index: 9999;">
                            <a href="{{ route('perfil.edit', [$user->idUsu, 'editar']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Editar perfil</a>

                            <a href="{{ route('perfil.edit', [$user->idUsu, 'cambiar']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Cambiar contraseña</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="grid grid-cols-1 gap-2 relative">
                    <p class="text-xl"><img class="inline-block w-10 mr-2"
                            src="{{ URL::asset('img/usuario.svg') }}" />USUARIO: {{ $user->name }}</p>
                    <p class="text-xl w-1/3 pb-3 border-b border-slate-600"><img class="inline-block w-10 mr-2"
                            src="{{ URL::asset('img/email.svg') }}" />EMAIL: {{ $user->email }}</p>
                    <div class="mt-2 text-xl">
                        <p>Número de hoteles visitados: {{ $hoteles->count() }}</p>
                        <p>Número de restaurantes visitados: {{ $restaurantes->count() }}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        const settingsButton = document.querySelector('.relative button');

        const dropdown = document.querySelector('.relative .absolute');

        settingsButton.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });
    </script>
</body>

</html>
