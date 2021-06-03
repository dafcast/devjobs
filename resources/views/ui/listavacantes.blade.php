<div class="mt-5">
    <ul class="grid md:grid-cols-2 gap-8">
        @foreach($vacantes as $vacante)
            <li class="p-5 bg-white shadow">
                <h2 class="text-xl text-green-600 font-bold">{{$vacante->titulo}}</h2>
                <p>{{$vacante->categoria->nombre}}</p>
                <p>Ubicación: <span class="font-bold">{{$vacante->ubicacion->ubicacion}}</span></p>
                <p>Experiencia: <span class="font-bold">{{$vacante->experiencia->experiencia}}</span></p>
                <a  class="bg-green-600 mt-3 py-2 px-3 text-white rounded font-bold inline-block" href="{{route('vacantes.show',['vacante' => $vacante->id])}}">Ver Vacante</a>
            </li>
        @endforeach
    </ul>
</div>