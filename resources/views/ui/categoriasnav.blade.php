<!--@foreach ($categorias as $categoria)
    <a
    class="text-white text-sm uppercase font-bold p-3"
    href="{{route('categorias.show', ['categoria' => $categoria->id])}}">
        {{$categoria->nombre}}
    </a>
@endforeach-->


@section('navegacion')

<header class="font-sans antialiased" id="app">
    <div class="flex items-center justify-between flex-wrap p-3">
      <div class="text-left sm:text-center md:hidden">
        <span class=" text-left sm:text-center font-bold uppercase text-gray-100">Categorias</span>
      </div>
      <div class="block sm:hidden ">
        <button @click="toggle" class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-green-400 hover:border-green-400">
          <svg class="fill-current h-3 w-3 hover:text-green-400" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
      </div>
      <div :class="open ? 'block': 'hidden'" class="w-full flex-grow md:flex md:items-center md:w-auto mt-3 text-center">
        <div class="text-sm md:hidden">
            @foreach ($categorias as $categoria)
            <a
            class="text-white text-sm uppercase font-bold block w-full text-center p-3 hover:bg-gray-500"
            href="{{route('categorias.show', ['categoria' => $categoria->id])}}">
                {{$categoria->nombre}}
            </a>
        @endforeach
        </div>
      </div>
      <div class="w-full block md:flex md:w-auto">
        <nav class="bg-grey-dark md:block" :class="open ? 'hidden': 'hidden'">
            <div class="w-full flex-grow md:flex sm:items-center md:w-auto">
                <div class="flex justify-center items-center md:flex-grow">
                    @foreach ($categorias as $categoria)
                        <a
                        class="text-white text-sm uppercase font-bold p-3 hover:text-green-400"

                        href="{{route('categorias.show', ['categoria' => $categoria->id])}}">
                            {{$categoria->nombre}}
                        </a>
                    @endforeach
                </div>
            </div>
          </nav>
      </div>
    </div>

  </header>
@endsection












