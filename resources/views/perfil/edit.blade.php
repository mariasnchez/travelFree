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
                <p class="translationText" data-translation-key="editPerNom">Edita tu nombre o email</p>
            </div>
            <div class=" mb-10 rounded-lg">


                @includeif('partials.errors')

                <div class="m-10">

                    <div class="container mx-auto px-4">
                        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg">
                            <div class="p-6">
                                <form method="POST" action="{{ route('perfil.update', $usuario->idUsu) }}">
                                    @method('PATCH')
                                    @csrf

                                    <div class="mb-4">
                                        <label for="nombre" class="block uppercase font-bold mb-1 translationText" data-translation-key="nombre">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" value="{{ $usuario->name }}"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="block uppercase font-bold mb-1">Email</label>
                                        <input type="text" name="email" id="email"
                                            value="{{ $usuario->email }}"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>


                                    <div>
                                        <button type="submit"
                                            class="bg-slate-500 hover:bg-slate-700 text-white font-bold uppercase py-2 px-4 rounded translationText" data-translation-key="guardar">Guardar
                                            cambios</button>
                                    </div>
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
