@extends('layouts.app')

@section('navegacion')
    @include('ui.navegacioncategorias')
@endsection


@section('content')
    <div class="my-10 bg-gray-100 p-5 shadow container mx-auto">
        <h1 class="text-3xl">Categoria: <span class="font-bold">{{$categoria->nombre}}</span></h1>
        @include('ui.listavacantes')
    </div>
</div>
@endsection