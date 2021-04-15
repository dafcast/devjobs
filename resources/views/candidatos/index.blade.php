@extends('layouts.app')


@section('navegacion')
    
    @include('ui.navegacion')

@endsection

@section('content')
    <h1 class="text-center my-6 text-3xl">Candidatos de: <span class="font-bold"><a href="{{route('vacantes.show',['vacante' => $vacante->id])}}">{{$vacante->titulo}}</a></span></h1>
    <ul class="max-w-sm mx-auto">
        @foreach($vacante->candidatos as $candidato)
            <li class="border border-gray-400 p-3 mb-2">
                <p>Nombre: <span class="font-bold">{{$candidato->nombre}}</span></p>
                <p>Correo: <span class="font-bold">{{$candidato->email}}</span></p>
                <a href="{{'/storage/cv/' . $candidato->cv}}" class="bg-green-600 inline-block p-3 text-white">Ver CV</a>
            </li>
        @endforeach
    </ul>
@endsection