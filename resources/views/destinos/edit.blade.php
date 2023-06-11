@extends('layouts.app')

@section('template_title')
    Destino
@endsection
<!DOCTYPE html>
<html lang="es">

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
            <img class="absolute m-6 left-0 top-0 w-10 " src="{{ URL::asset('img/user.png') }}">
            <p class="absolute m-8 left-10 top-0 w-40  text-white "> {{ Auth::user()->name }} </a>
        </div>

        <div>
            <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded"
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        </div>
        <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
        </div>
        <h1 class="absolute text-9xl text-white">TravelFree<img class="inline-block w-28 "
                src="{{ URL::asset('img/logo.svg') }}"></h1>
    </div>


    <div class="grid place-items-center bg-cyan-700">
        <div class=" flex items-center m-10">
            <h3 class="text-5xl text-white  underline decoration-2">Editar</h3>
        </div>
        <div class=" mb-10 rounded-lg bg-cyan-50">


            @includeif('partials.errors')

            <div class="text-center m-10">

                <div>
                    <form method="POST" action="{{ route('destinos.update', $destino->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('destinos.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>
