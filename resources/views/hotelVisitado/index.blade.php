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
<body  class="bg-cyan-700" >
    
    
    <div class= "grid place-items-center h-80 bg-image bg-cover" >
    <div class="absolute inset-0 bg-black opacity-40 h-80"></div>
            <div >
               <img class="absolute m-6 left-0 top-0 w-10 " src="{{URL::asset('img/user.png')}}"> <p class="absolute m-8 left-10 top-0 w-40  text-white "> {{ Auth::user()->name }} </a>
            </div>
            
            <div >
                <a class="absolute m-6 top-0 right-0 bg-zinc-700 hover:bg-zinc-500 text-white font-bold py-2 px-4 rounded" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </div>
            <div >
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </div>
        <h1 class="absolute text-9xl text-white">TravelFree<img class="inline-block w-28 " src="{{URL::asset('img/logo.svg')}}"></h1>
    </div>


    <div class="grid place-items-center bg-cyan-700">
        <div class="grid place-items-end bg-white mb-10 rounded-lg bg-cyan-50">
        <table class="text-center mb-10 ml-10 mr-10">
                    <thbody class="border border-gray-400">
                            @foreach ($hotelVisitado as $hotelVisitado)
                            <?php
                                if ($hotelVisitado->idUsu== Auth::user()->idUsu ) {
                                ?>
                                    <tr class="border border-gray-400">
                                         <!-- Estos son valores de la tabla hotel que pertenecen al usuario correspondiente de la tabla hotel_visitado  -->
                                        <td  class="px-4 py-2">{{ $hotelVisitado->hotel["nombre"] }}</td>
                                        <td  class="px-4 py-2">{{ $hotelVisitado->hotel["direccion"] }}</td>
                                        <td  class="px-4 py-2">{{ $hotelVisitado->hotel["descripcion"] }}</td>
                                        <td  class="px-4 py-2">{{ $hotelVisitado->hotel["precio"] }}</td>


                                        <!-- Y estos son valores de la tabla hotel_visitado   -->
                                        <td  class="px-4 py-2">{{ $hotelVisitado->fechaEntrada }}</td>
                                        <td  class="px-4 py-2">{{ $hotelVisitado->punUbi }}</td>

                                    <tr>
                                    <?php } ?>
                                
                            @endforeach
                    <thbody>    
            </table>
        </div>
     </div>

</body>
</html>


