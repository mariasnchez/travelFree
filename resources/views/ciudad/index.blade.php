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
    </style>
</head>

<body class="bg-cyan-700">


    <div class="grid place-items-center h-80 bg-image bg-cover">
        <div class="absolute inset-0 bg-black opacity-40 h-80"></div>
        <div>
            <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                href="">{{ __('Login') }}</a>
        </div>
        <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
        </div>
        <h1 class="absolute text-9xl text-white">TravelFree<img class="inline-block w-28 "
                src="{{ URL::asset('img/logo.svg') }}"></h1>
    </div>

    <div class="flex items-center justify-center mt-10 text-white text-2xl">
        <a class="px-4 mr-6 cursor-pointer rounded font-bold hover:bg-white hover:text-cyan-700"
            href="hotel">HOTELES</a>
        <a class="px-4 mL-6 cursor-pointer rounded font-bold hover:bg-white hover:text-cyan-700"
            href="restaurante">RESTAURANTES</a>
    </div>
    <div class="grid place-items-center bg-cyan-700">
        <div class=" flex items-center m-10">
        </div>
        <div class="grid place-items-end bg-white mb-10 rounded-lg bg-cyan-50">
            <table class="text-center mb-10 ml-10 mr-10">
                <thbody class="border border-gray-400">
                    @foreach ($ciudad as $ciudad)
                        <?php
                        ?>
                        <tr class="border border-gray-400">
                            <td class="px-4 py-2">{{ $ciudad->nombre }}</td>
                            <td class="px-4 py-2">{{ $ciudad->pais }}</td>
                            <td class="px-4 py-2">{{ $ciudad->descripcion }}</td>
                            <td class="px-4 py-2">{{ $ciudad->foto1 }}</td>
                        <tr>
                    @endforeach
                    <thbody>
            </table>
        </div>
    </div>

</body>

</html>
