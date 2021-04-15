@extends('layouts.app')


@section('navegacion')
    
    @include('ui.navegacion')

@endsection

@section('content')
    <h1 class="text-center my-6 text-3xl">Notificaciones</h1>
    <ul class="max-w-sm mx-auto">
        @foreach($notificaciones as $notificacion)
            @php
                $data = $notificacion->data;
            @endphp
            <li class="border border-gray-400 px-2 py-4 mb-1">
                <p>Tienes un nuevo candidato en: <span class="font-bold">{{$data['vacante']}}</span></p>
                <p>Te escribio: <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span></p>
                <a class="bg-green-600 inline-block p-3 text-white" href="{{route('candidatos.index',['vacante' => $data['vacante_id']])}}">Ver candidatos</a>
            </li>
        @endforeach
    </ul>
@endsection