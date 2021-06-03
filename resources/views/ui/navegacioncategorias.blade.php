<nav class="container mx-auto text-white font-bold uppercase flex flex-col md:flex-row items-center">
    @foreach($categorias as $categoria)
        <a href="{{ route('categorias.show',['categoria' => $categoria->id])}}" class="w-full md:w-auto p-3 {{ Request::is('categorias/' . $categoria->id) ? 'bg-green-700' : '' }}">{{$categoria->nombre}}</a>
    @endforeach
</nav>