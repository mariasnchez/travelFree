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
            <img class="inline-block w-16" src="{{ URL::asset('img/logo.svg') }}" />
        </div>
        <div class=" mt-6 text-black">
            <a href="/perfil" class="text-lg hover:underline"><img class="inline-block w-5 mr-2"
                    src="{{ URL::asset('img/volver.svg') }}" />
                <p class="translationText inline-block hover:underline" data-translation-key="volver">Volver</p>
            </a>
        </div>
        <div class="container m-10 mt-3">
            <div class="text-4xl text-[#727272] mb-10 text-center">
                <p class="translationText" data-translation-key="cambiar">Cambiar contraseña</p>
            </div>
            <div class=" mb-10 rounded-lg">


                @includeif('partials.errors')

                <div class="m-10">

                    <div class="container mx-auto px-4">
                        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg">
                            <div class="p-6">
                                <form action="{{ route('actualizar') }}" method="POST">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="contrasena_actual" class="block uppercase font-bold mb-1 translationText" data-translation-key="passNow">Contraseña
                                            actual</label>
                                        <input type="password" id="contrasena_actual" name="contrasena_actual"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                        @error('contrasena_actual')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="nueva_contrasena" class="block uppercase font-bold mb-1 translationText" data-translation-key="nuevaCon">Nueva
                                            contraseña</label>
                                        <input type="password" id="nueva_contrasena" name="nueva_contrasena"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                        @error('nueva_contrasena')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="nueva_contrasena_confirmation"
                                            class="block uppercase font-bold mb-1 translationText" data-translation-key="confNuevaCo">Confirmar nueva contraseña</label>
                                        <input type="password" id="nueva_contrasena_confirmation"
                                            name="nueva_contrasena_confirmation"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>

                                    <button type="submit"
                                        class="bg-slate-500 hover:bg-slate-700 text-white font-bold uppercase py-2 px-4 rounded translationText" data-translation-key="actualizar">Actualizar
                                        contraseña</button>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <button class="traducir" id="EnglishButton">English</button>
    <button class="traducir" id="SpanishButton">Español</button>

</body>
