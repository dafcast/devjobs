@extends('layouts.app')

@section('navegacion')
    @include('ui.navegacioncategorias')
@endsection


@section('content')

<div class="container mx-auto">
    <div class="md:flex mt-10 bg-white shadow">
        <div class="md:w-1/2 flex flex-col justify-center p-5">
            <p class="text-2xl">dev<span class="font-bold">Jobs</span></p>
            <h1 class="text-3xl font-bold">Encuentra un trabajo remoto o en tu país
                <span class="text-green-600 block">Para desarrolladores / Diseñadores Web</span>
            </h1>

            <h2 class="my-5 text-2xl">Busca una vacante</h2>
            <form action="{{route('vacantes.busqueda')}}" method="POST">
                @csrf
                <div class="mb-5 flex flex-wrap">
                    <label for="categoria" class="w-full text-sm text-gray-600 mb-2">Categoria vacante</label>
                    <select name="categoria" id="categoria" 
                    class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
                    leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500 @error('categoria') ring-2 ring-red-700 focus:ring-red-700 @enderror">
                        <option value="" disabled selected>-- seleccione --</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" {{ (old('categoria') == $categoria->id) ? 'selected' :'' }}>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
        
                    @error('categoria')
                    <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="mb-5 flex flex-wrap">
                    <label for="ubicacion" class="w-full text-sm text-gray-600 mb-2">Ubicacion</label>
                    <select name="ubicacion" id="ubicacion" 
                    class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
                    leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500 @error('ubicacion') ring-2 ring-red-700 focus:ring-red-700 @enderror">
                        <option value="" disabled selected>-- seleccione --</option>
                        @foreach($ubicacions as $ubicacion)
                            <option value="{{$ubicacion->id}}" {{ (old('ubicacion') == $ubicacion->id) ? 'selected' :'' }}>{{$ubicacion->ubicacion}}</option>
                        @endforeach
                    </select>
        
                    @error('ubicacion')
                        <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-green-600 p-2 text-gray-100 uppercase font-bold hover:bg-green-700 focus:outline-none">
                    Buscar Vacantes
                </button>
        

            </form>
        </div>
        <div class="md:w-1/2">
            <img src="{{asset('img/4321.jpg')}}" class="h-full w-full object-cover object-center" alt="Programador">
        </div>
    </div>

    <div class="my-10 bg-gray-100 p-5 shadow">
        <h1 class="text-3xl">Nuevas <span class="font-bold">Vacantes</span></h1>
        @include('ui.listavacantes')
    </div>
</div>
@endsection