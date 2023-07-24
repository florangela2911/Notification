@extends('layouts.imp')
@section('content')

<x-app-layout>
   <div class="text-2xl text-center mt-4">
    <h1>
      IMPORTAR DATOS
    </h1>
   </div>
      <div class="flex justify-end py-4 ">
        <form action="{{ route('import.data') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <input required type="file" id="documento" name="documento">
            <x-primary-button class="ml-2 bg-cyan-300">Importar</x-primary-button>
            @if ($errors->has('documento'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ $errors->first('documento') }}.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif
        </form>
        <form action="{{ route('/exportar') }}" onsubmit="return exportar()" method="get" menctype="multipart/form-data">
            <x-primary-button class="ml-2 bg-green-400 outline-none"  onclick="exportar()">Exportar </x-primary-button>
        </form>
      </div>

      <livewire:usuarios_gs-table/>

</x-app-layout>


@endsection

