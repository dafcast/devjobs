@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection


@section('content')
    <h1 class="container mx-auto text-center text-3xl my-10">{{$vacante->titulo}}</h1>
    <div class="md:flex container mx-auto">
        <div class="md:w-3/5 mx-2">
            @php
                $fechaVacante = $vacante->created_at->diffForHumans();
            @endphp
            <p class="text-gray-700 font-bold">Publicado <span class="font-normal">{{$fechaVacante}}</span> por: <span class="font-normal">{{$vacante->user->name}}</span></p>
            <p class="text-gray-700 font-bold">Categoriá: <span class="font-normal">{{$vacante->categoria->nombre}}</span></p>
            <p class="text-gray-700 font-bold">Salario: <span class="font-normal">{{$vacante->salario->salario}}</span></p>
            <p class="text-gray-700 font-bold">Ubicación: <span class="font-normal">{{$vacante->ubicacion->ubicacion}}</span></p>
            <p class="text-gray-700 font-bold">Experiencia: <span class="font-normal">{{$vacante->experiencia->experiencia}}</span></p>
            
            <h2 class="text-center text-2xl text-gray-700 my-10">Conocimientos y Tecnologías</h2>
            @php
                $arraySkills = explode(",", $vacante->skills);
            @endphp
            @foreach($arraySkills as $skill)
                <p class="inline-block border border-gray-400 rounded text-gray-700 py-1 px-3 mt-2">{{$skill}}</p>
            @endforeach
            <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen_vacante" data-title="{{$vacante->titulo}}">
                <img src="/storage/vacantes/{{$vacante->imagen}}" alt="Imagen vacante" class="mt-10 w-60">
            </a>
            <div class="text-gray-700 mt-10">{!! $vacante->descripcion !!}</div>
        </div>
        <aside class="md:w-2/5">
            <div class="bg-green-600 rounded p-5 mx-2">
                <h2 class="text-white uppercase text-center text-2xl pt-3">Contactar al reclutador</h2>
                <form action="{{route('candidatos.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label for="nombre"
                            id="nombre"
                            name="nombre"
                            class="text-white">Nombre:</label>
                        <input type="text"
                            id="nombre"
                            name="nombre"
                            value="{{old('nombre')}}"
                            class="w-full my-2 p-3 rounded @error('nombre') border-2 border-red-700 @enderror">
                        @error('nombre')
                            <span class="border-l-2 border-red-700 text-red-700 bg-red-200 p-3 my-2 w-full block">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="email" class="text-white">Email:</label>
                        <input type="email"
                            id="email"
                            name="email"
                            value="{{old('email')}}"
                            class="w-full my-2 p-3 rounded @error('email') border-2 border-red-700 @enderror">
                        @error('email')
                            <span class="border-l-2 border-red-700 text-red-700 bg-red-200 p-3 my-2 w-full block">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label for="cv" class="text-white">Curriculum (PDF):</label>
                        <input type="file"
                            id="cv"
                            name="cv"
                            class="w-full my-2 p-3 rounded @error('cv') border-2 border-red-700 @enderror"
                            accept="application/pdf"
                        >
                        @error('cv')
                            <span class="border-l-2 border-red-700 text-red-700 bg-red-200 p-3 my-2 w-full block">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="vacante_id" value="{{$vacante->id}}">
                    <input type="submit"
                        value="contactar"
                        class="w-full bg-green-800 text-white uppercase py-3 focus:outline-none cursor-pointer hover:bg-green-900"
                    >
                </form>
            </div>
        </aside>
    </div>
@endsection