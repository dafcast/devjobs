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
            <li class="border border-gray-400 px-2 py-4 mb-1">Tienes un nuevo candidato en: <span class="font-bold">{{$data['vacante']}}</span></li>
        @endforeach
    </ul>
@endsection