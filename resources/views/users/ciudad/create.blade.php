@extends('layouts.app')


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TravelFree</title>
</head>

<body class="bg-[#ECECEC] contenedor">
    <div class="m-10">
        <div class="mb-4 flex justify-between items-center">
            <img class="inline-block w-16" src="{{ URL::asset('img/logo.svg') }}" />
        </div>
        <div class=" mt-6 text-black">
            <a href="/users/ciudades" class="text-lg hover:underline"><img class="inline-block w-5 mr-2"
                    src="{{ URL::asset('img/volver.svg') }}" />Volver</a>
        </div>
        <div class="container m-10 mt-3">
            <div class="text-4xl text-[#727272] mb-10 text-center">
                <p>Añadir ciudad</p>
            </div>
            <div class=" mb-10 rounded-lg">


                @includeif('partials.errors')

                <div class="m-10">

                    <div class="container mx-auto px-4">
                        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg">
                            <div class="p-6">
                                <form action="{{ route('users.ciudad.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="nombre" class="block uppercase font-bold mb-1">Nombre</label>
                                        <input type="text" name="nombre" id="nombre"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                            required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="pais" class="block uppercase font-bold mb-1">País</label>
                                        <input type="text" name="pais" id="pais"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                            required>
                                    </div>


                                    <div class="mb-4">
                                        <label for="descripcion"
                                            class="block uppercase font-bold mb-1">Descripción</label>
                                        <textarea name="descripcion" id="descripcion"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500" required></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto1" class="block uppercase font-bold mb-1">Foto 1</label>
                                        <input type="text" name="foto1" id="foto1"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500"
                                            required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto2" class="block uppercase font-bold mb-1">Foto 2</label>
                                        <input type="text" name="foto2" id="foto2"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto3" class="block uppercase font-bold mb-1">Foto 3</label>
                                        <input type="text" name="foto3" id="foto3"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>

                                    <div class="mb-4">
                                        <label for="foto4" class="block uppercase font-bold mb-1">Foto 4</label>
                                        <input type="text" name="foto4" id="foto4"
                                            class="w-full border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-500">
                                    </div>


                                    <div>
                                        <button type="submit"
                                            class="bg-slate-500 hover:bg-slate-700 text-white font-bold uppercase py-2 px-4 rounded inline-block">Guardar
                                        </button>


                                </form>
                                <button id="obtenerDatos"
                                    class="bg-slate-500 hover:bg-slate-700 text-white font-bold uppercase py-2 px-4 rounded inline-block">Insertar
                                    ciudad</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/api.js') }}"></script>


</body>
