@extends('layouts.app')


@section('navegacion')
    <nav class="container mx-auto text-white font-bold uppercase flex flex-wrap">
        @include('ui.navegacion')
    </nav>
@endsection

@section('content')
<div class="container mx-auto">
    <h1 class="text-center mt-20 text-2xl">Administrar Vacantes</h1>
</div>
@endsection
