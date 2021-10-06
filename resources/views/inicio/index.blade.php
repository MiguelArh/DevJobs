@extends('layouts.app')

@section('navegacion')
    @include('ui.categoriasnav')
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-white">
        <div class="lg:w-3/5 px-8 lg:px-12 py-12 lg:py-16">
            <p class="text-2xl text-gray-700">
                dev<span class="font-bold">Jobs</span>
            </p>
            <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-700 leading-tight">
                Encuentra un Trabajo Remoto o en tu País
                <span class="text-green-500 block">Para Desarrolladores / Diseñadores Web</span>
            </h1>

            @include('ui.buscar')

        </div>
        <div class="block lg:w-2/5">
            <img class="inset-0 h-full w-full object-cover" src="{{ secure_asset('img/05.jpg') }}" alt="devjobs">
        </div>
    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Nuevas
            <span class="font-bold">Vacantes</span>
        </h1>

        @include('ui.listadovacantes')
    </div>

@endsection
