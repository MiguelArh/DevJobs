@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css"
    integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('navegacion')
@include('ui.adminnav')
@endsection

@section('content')

<h1 class="text-2xl text-center mt 10">Nueva Vacante</h1>

<form class="max-w-lg max-h-screen mx-auto my-5" action=" {{ route('vacantes.store')}}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante: </label>
        <input id="titulo" type="text"
            class="p-3 bg-gray-white rounded form-input w-full  @error('email') is-invalid @enderror" name="titulo"
            placeholder="Titulo de la Vacante" value=" {{ old('titulo') }} ">

        @error('titulo')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>
        <select id="categoria" class="block appearance-none w-full border border-gray-200
            text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
            p-3 bg-gray-100" name="categoria">
            <option disabled selected> -- Selecciona--</option>

            @foreach($categorias as $categoria)
            <option {{ old('categoria') == $categoria->id ? 'selected' : ''}} value="{{$categoria->id}}">
                {{$categoria->nombre}}
            </option>
            @endforeach

        </select>

        @error('categoria')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>
    <!-- {{$categorias}}-->

    <div class="mb-5">
        <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>
        <select id="experiencia" class="block appearance-none w-full border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
        p-3 bg-gray-100" name="experiencia">
            <option disabled selected> -- Selecciona--</option>

            @foreach($experiencias as $experiencia)
            <option {{ old('experiencia') == $experiencia->id ? 'selected' : ''}}
                value="{{$experiencia->id}}">
                {{$experiencia->nombre}}
            </option>
            @endforeach

        </select>

        @error('experiencia')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>
        <select id="ubicacion" class="block appearance-none w-full border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
        p-3 bg-gray-100" name="ubicacion">
            <option disabled selected> -- Selecciona--</option>

            @foreach($ubicaciones as $ubicacion)
            <option
            {{ old('ubicacion') == $ubicacion->id ? 'selected' : ''}}
            value="{{$ubicacion->id}}">
                {{$ubicacion->nombre}}
            </option>
            @endforeach

        </select>

        @error('ubicacion')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>
        <select id="salario" class="block appearance-none w-full border border-gray-200
        text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
        p-3 bg-gray-100" name="salario">
            <option disabled selected> -- Selecciona--</option>

            @foreach($salarios as $salario)
            <option
            {{ old('salario') == $salario->id ? 'selected' : ''}}
            value="{{$salario->id}}">
                {{$salario->nombre}}
            </option>
            @endforeach

        </select>

        @error('salario')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion del puesto</label>

        <div class="editable p-3 bg-white rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion" value=" {{old('descripcion')}} ">
            @error('descripcion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{$message}}</span>
            </div>
            @enderror


    </div>


    <div class="mb-5">
        <label for="" class="block text-gray-700 text-sm mb-2">Imagen de la Vacante:</label>
        <div id="dropzoneDevJobs" class="dropzone rounded bg-white"></div>
        <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen')}}">
        @error('imagen')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{$message}}</span>
            </div>
            @enderror
        <p id="error"></p>
    </div>

    <div class="mb-5">
        <label for="skills" class="block text-gray-700 text-sm mb-2">Habilidades y Conocimientos:</label>

        @php
        $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS',
        'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django',
        'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter',
        'MobX', 'C#', 'Ruby on Rails']
        @endphp

        <lista-skills
        :skills="{{ json_encode($skills)}}"
        :oldskills=" {{json_encode(old('skills'))}} ">

        </lista-skills>

        @error('skills')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{$message}}</span>
            </div>
            @enderror


    </div>


    <button type="submit" class="bg-green-500 w-full hover:bg-green-700
                text-gray-100 p-3 focus:outline-none
                focus-shadow-outline uppercase font-bold mb-10">Publicar Vacante

    </button>
</form>


@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js"
    integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
    integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded', () => {


        //MediumEditor
        const editor = new MediumEditor('.editable', {
            toolbar: {
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft',
                    'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist',
                    'h2', 'h3'
                ],
                static: true,
                sticky: true
            },
            placeholder: {
                text: 'Información de la Vacante'
            }
        });

        //Muestra en Tiempo Real lo que el usguario escribe en el Editor
        editor.subscribe('editableInput', function (eventObj, editable) {
            //Traer el contenido que tenga el editor
            const contenido = editor.getContent();
            document.querySelector('#descripcion').value = contenido;
        })

        //Llena el editor con el Contenido del Input Hidden

        editor.setContent(document.querySelector('#descripcion').value);

        //DropZone

        const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
            url: "/vacantes/imagen",
            dictDefaultMessage: 'Sube Aqui tu Archivo',
            acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp",
            addRemoveLinks: true,
            dictRemoveFile: 'Borrar Archivo',
            maxFiles: 1,

            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
            },

            /*
            init: function(){
                if(document.querySelector('#imagen').value.trim() ){
                   let imagenPublicada = {name: document.querySelector('#imagen').value, size: 12345};
                       //imagenPublicada.size = 12345;
                       var myDropzone = new Dropzone("#imagen");

                       myDropzone.options.addedfile.call(this, imagenPublicada);
                       myDropzone.options. thumbnail.call(this, imagenPublicada, "/storage/vacantes/${imagenPublicada.name}");
                       imagenPublicada.previewElement.classList.add('dz-sucess');
                       imagenPublicada.previewElement.classList.add('dz-complete');


                   }
               },*/


               init: function(){
                if (document.querySelector('#imagen').value) {
                    //console.log('Si hay algo')

                    let imagenPublicada = {};
                    imagenPublicada.size = 12345;
                    imagenPublicada.name = document.querySelector('#imagen').value;

                    this.options.addedfile.call(this, imagenPublicada);
                    this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);
                    imagenPublicada.previewElement.classList.add('dz-sucess');
                    imagenPublicada.previewElement.classList.add('dz-complete');
                }
               },

            success: function (file, response) {
                //console.log(file);
                //console.log(response);
                console.log(response.correcto);
                document.querySelector('#error').textContent = '';

                //Coloca la Respuesta del Servidor en el input Hidden Imagen
                document.querySelector('#imagen').value = response.correcto;

                //Añadir al Objeto de Archivo el nombre del servidor
                file.nombreServidor = response.correcto;
            },
            maxfilesexceeded: function (file) {


                if (this.files[1] != null) {
                    this.removeFile(this.files[0]); //Eliminar el archivo anterior
                    this.addFile(file); // Agregar el Nuevo Archivo
                }
            },
            removedfile: function (file, response) {
                file.previewElement.parentNode.removeChild(file.previewElement);

                params = {
                    imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                }

                axios.post('/vacantes/borrarimagen', params)
                    .then(respuesta => console.log(respuesta))
            }
        });

    })

</script>
@endsection
