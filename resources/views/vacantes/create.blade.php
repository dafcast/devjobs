@extends('layouts.app')


@section('navegacion')
    <nav class="container mx-auto text-white font-bold uppercase flex flex-wrap">
        @include('ui.navegacion')
    </nav>
@endsection

@section('content')
<div class="container mx-auto">
    <h1 class="text-center mt-20 text-2xl">Nueva Vacante</h1>

    <form class="m-10 mx-auto w-full max-w-lg">
        <div class="mb-5 flex flex-wrap">
            <label for="titulo" class="w-full text-sm text-gray-600 mb-2">Titulo de la vacante:</label>
            <input 
                class="bg-gray-100 w-full rounded py-2 focus:outline-none focus:ring-2 focus:ring-gray-600 @error('email') ring-2 ring-red-700 focus:ring-red-700 @enderror"
                type="text"
                id="titulo"
                name="titulo"
            >
        </div>
        <div class="mb-5 flex flex-wrap">
            <label for="categoria" class="w-full text-sm text-gray-600 mb-2">Categoria vacante</label>
            <select name="categoria" id="categoria" 
            class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
            leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500">
                <option value="" disabled selected>-- seleccione --</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5 flex flex-wrap">
            <label for="experiencia" class="w-full text-sm text-gray-600 mb-2">Experiencia</label>
            <select name="experiencia" id="experiencia" 
            class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
            leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500">
                <option value="" disabled selected>-- seleccione --</option>
                @foreach($experiencias as $experiencia)
                    <option value="{{$experiencia->id}}">{{$experiencia->experiencia}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5 flex flex-wrap">
            <label for="ubicacion" class="w-full text-sm text-gray-600 mb-2">Ubicacion</label>
            <select name="ubicacion" id="ubicacion" 
            class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
            leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500">
                <option value="" disabled selected>-- seleccione --</option>
                @foreach($ubicacions as $ubicacion)
                    <option value="{{$ubicacion->id}}">{{$ubicacion->ubicacion}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5 flex flex-wrap">
            <label for="salario" class="w-full text-sm text-gray-600 mb-2">Salario</label>
            <select name="salario" id="salario" 
            class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
            leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500">
                <option value="" disabled selected>-- seleccione --</option>
                @foreach($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-green-600 p-2 text-gray-100 uppercase font-bold hover:bg-green-700 focus:outline-none">
            Publicar vacante
        </button>

    </form>
</div>
@endsection
