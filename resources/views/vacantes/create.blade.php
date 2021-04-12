@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.navegacion')
@endsection

@section('content')
<div class="container mx-auto">
    <h1 class="text-center mt-20 text-2xl">Nueva Vacante</h1>

    <form class="m-10 mx-auto w-full max-w-lg" action="{{route('vacantes.store')}}" method="POST">
        @csrf

        <div class="mb-5 flex flex-wrap">
            <label for="titulo" class="w-full text-sm text-gray-600 mb-2">Titulo de la vacante:</label>
            <input 
                class="bg-gray-100 w-full rounded py-2 focus:outline-none focus:ring-2 focus:ring-gray-600 @error('titulo') ring-2 ring-red-700 focus:ring-red-700 @enderror"
                type="text"
                id="titulo"
                name="titulo"
                value="{{old('titulo')}}"
            >
            @error('titulo')
                <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

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
            <label for="experiencia" class="w-full text-sm text-gray-600 mb-2">Experiencia</label>
            <select name="experiencia" id="experiencia" 
            class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
            leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500 @error('experiencia') ring-2 ring-red-700 focus:ring-red-700 @enderror">
                <option value="" disabled selected>-- seleccione --</option>
                @foreach($experiencias as $experiencia)
                    <option value="{{$experiencia->id}}" {{ (old('experiencia') == $experiencia->id) ? 'selected' :'' }}>{{$experiencia->experiencia}}</option>
                @endforeach
            </select>

            @error('experiencia')
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

        <div class="mb-5 flex flex-wrap">
            <label for="salario" class="w-full text-sm text-gray-600 mb-2">Salario</label>
            <select name="salario" id="salario" 
            class="w-full p-2 appearance-none rounded bg-gray-100 border border-gray-200
            leading-tight focus:outline-none focus:bg-white text-gray-700 focus:border-gray-500 @error('salario') ring-2 ring-red-700 focus:ring-red-700 @enderror">
                <option value="" disabled selected>-- seleccione --</option>
                @foreach($salarios as $salario)
                    <option value="{{$salario->id}}" {{ (old('salario') == $salario->id) ? 'selected' :'' }}>{{$salario->salario}}</option>
                @endforeach
            </select>
            @error('salario')
                <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="mb-5 flex flex-wrap">
            <label for="descripcion" class="w-full text-sm text-gray-600 mb-2">Descripcion</label>
            <div class="editable w-full p-3 bg-gray-100 rounded form-input text-gray-700 @error('descripcion') ring-2 ring-red-700 focus:ring-red-700 @enderror"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
            @error('descripcion')
                <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-5 flex flex-wrap">
            <label for="dropzoneDevJobs" class="w-full text-sm text-gray-600 mb-2">Imagen vacante</label>
            <div id="dropzoneDevJobs" class="dropzone w-full  @error('imagen') ring-2 ring-red-700 focus:ring-red-700 @enderror"></div>
            <input type="hidden" name="imagen" id="imagen" value="{{old('imagen')}}">
            <span id="errorArchivo" class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mb-4 hidden font-bold" role="alert"></span>
            @error('imagen')
                <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @php
            $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
        @endphp

        <div class="mb-5 flex flex-wrap">
            <label for="skills" class="w-full text-sm text-gray-600 mb-2">Habilidades y conocimientos</label>
            <lista-skills
                :skills="{{json_encode($skills)}}"
                :oldskills="{{json_encode(old('skills'))}}"
            ></lista-skills>
            @error('skills')
                <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <button type="submit" class="w-full bg-green-600 p-2 text-gray-100 uppercase font-bold hover:bg-green-700 focus:outline-none">
            Publicar vacante
        </button>

    </form>
</div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.min.js" integrity="sha512-QpZR7HNNxb5QQ5+qVXikXT0nDHUEwr0sNLG2pLaFCzpJ7ZqSsNEU8YfzWr9VzX29r7XPTPgASyfTFZeoSJe3sA==" crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {

            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter','justifyRight', 'justifyFull', 'orderedList', 'unorderedLists', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            });

            //agregar contenido al input hidden

            editor.subscribe('editableInput', function(eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            //leer valor del input hiddent

            editor.setContent(document.querySelector('#descripcion').value);


            // Dropzone

            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs',{
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Sube tu archivo',
                acceptedFiles: ".png,.jpg,.jpeg,.bmp,.gif",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function(){
                    if(document.querySelector('#imagen').value){
                        let imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = document.querySelector('#imagen').value;

                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada,`/storage/vacantes/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-success');
                        imagenPublicada.previewElement.classList.add('dz-complete');

                    }
                },
                success: function(file, response){

                    const error = document.querySelector('#errorArchivo');
                    
                    error.style.display = 'none';
                    error.textContent = '';


                    document.querySelector('#imagen').value = response.correcto;
                    file.nombreServidor = response.correcto;
                },
                error: function(file, response, errorMessage){

                    const error = document.querySelector('#errorArchivo');
                    if(response == "You can't upload files of this type."){
                        error.style.display = 'block';
                        error.textContent = 'Archivo no valido';
                        if(this.files.length > 1){
                            this.removeFile(this.files[1]);
                        }else{
                            this.removeFile(this.files[0]);
                        }

                        
                    }
                },
                maxfilesexceeded: function(file){
                    if(this.files.length > 1){
                        this.removeFile(this.files[0]);
                        file.previewElement.parentElement.removeChild(file.previewElement);
                        this.files.shift();
                        this.addFile(file);
                    }
                },
                removedfile: function(file,response){
                    file.previewElement.parentElement.removeChild(file.previewElement);
                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }
                    axios.post('/vacantes/eliminarimagen',params).then(respuesta => console.log(respuesta));
                }
            })
        });
        
    </script>
@endsection