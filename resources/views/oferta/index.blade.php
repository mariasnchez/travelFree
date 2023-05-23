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
    .search-input {
      background-image: url('{{ asset('img/buscador.svg') }}');
      background-repeat: no-repeat;
      background-position: 10px center;
      padding-left: 40px;
    }
</style>
</head>
<body  class="bg-cyan-700" >
    
    
    <div class= "grid place-items-center h-80 bg-image bg-cover" >
    <div class="absolute inset-0 bg-black opacity-40 h-80"></div>
            <div >
                  <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
        <h1 class="absolute text-9xl text-white">TravelFree<img class="inline-block w-28 " src="{{URL::asset('img/logo.svg')}}"/></h1>
    </div>

    <div class="flex items-center justify-center mt-10 text-white text-2xl">
        <a class="border rounded-md px-2 mr-6 cursor-pointer">HOTELES</a>
        <a class="border rounded-md px-2 ml-6 cursor-pointer">DESTINOS</a>
    </div>

    <div class="flex items-center justify-center m-5">
        <div class="max-w-md w-full">
            <div class="flex items-center shadow-xl">
                <input type="text" id="search-input" placeholder="¿Dónde quieres ir?" class="search-input w-full appearance-none rounded-xl border py-3 pl-12 pr-12 outline-none focus:bg-slate-100">
            </div>
        </div>
    </div>

     <div class="flex items-center m-10  text-white text-2xl">
        <h1>Búsquedas recientes</h1>
    </div>

    <div class="flex items-center m-10 text-white text-2xl">
        <h1>Las mejores ofertas en el momento</h1>
        @foreach ($oferta as $oferta)
        {{ $oferta->precioOferta }}
        @endforeach
    </div>

    <!-- <div class="grid place-items-center bg-cyan-700">
        <div class="grid place-items-end bg-white mb-10 rounded-lg bg-cyan-50">
        <table class="text-center mb-10 ml-10 mr-10">
                    <thbody class="border border-gray-400">
                            @foreach ($oferta as $oferta)

                                    <tr class="border border-gray-400">
                                        
                                    <tr>
                                
                            @endforeach
                    <thbody>    
            </table>
        </div>
     </div> -->

</body>
</html>


