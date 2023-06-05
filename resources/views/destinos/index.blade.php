@extends('layouts.app')

@section('template_title')
    Destino
@endsection

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
        <div class=" flex items-center m-10">
        <h3 class="text-5xl text-white  underline decoration-2">Destinos visitados</h3>
        </div>
        <div class="grid place-items-end bg-white mb-10 rounded-lg bg-cyan-50">
        <a href="{{ URL::to('destinos/create') }}" class="hover:text-zinc-600 mr-10 mt-3 mb-3 " > Nuevo destino <img class="inline-block w-8 " src="{{URL::asset('img/mas.png')}}" ></a>
        <table class="text-center mb-10 ml-10 mr-10">
                    <thead  class="border border-gray-400">
                                    <tr>
                                        <th class="border border-gray-400 px-4 py-2">Ciudad</th>
                                        <th class="border border-gray-400 px-4 py-2">Hotel</th>
                                        <th class="border border-gray-400 px-4 py-2">Nº de noches</th>
                                        <th class="border border-gray-400 px-4 py-2">Valoracion</th>
                                        <th class="border border-gray-400 px-4 py-2"><img class="w-8" src="{{URL::asset('img/editar.png')}}" alt=""></th>
                                        <th class="border border-gray-400 px-4 py-2"><img class="w-8" src="{{URL::asset('img/eliminar.png')}}" alt=""></th>
                                    </tr>
                    </thead>
                    <thbody class="border border-gray-400">
                            @foreach ($destinos as $destino)
                            <?php
                                if ($destino->idUsu== Auth::user()->idUsu ) {
                                ?>
                                    <tr class="border border-gray-400">
                                        <td  class="px-4 py-2">{{ $destino->ciudad }}</td>
                                        <td  class="px-4 py-2">{{ $destino->hotel }}</td>
                                        <td  class="px-4 py-2">{{ $destino->noches }}</td>
                                        <td  class="px-4 py-2">{{ $destino->valoracion }}/10</td>
                                        <td>
                                    

                                        <form action="{{ route('destinos.destroy',$destino->id) }}" method="POST">
                                        <a class="text-teal-600 hover:text-teal-800 font-bold" href="{{ route('destinos.edit',$destino->id) }}"> Editar</a>

                                                        @csrf
                                                        @method('DELETE')
                                           <td> <button type="submit" class="text-red-500 hover:text-red-800 font-bold"> Borrar</button> </td>
                                        </form>

                                    <tr>
                                    <?php } ?>
                                
                            @endforeach
                    </thbody>    
            </table>
        </div>
     </div>

</body>
</html>


