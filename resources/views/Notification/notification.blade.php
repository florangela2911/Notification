@extends('layouts.imp')
@section('content')

<x-app-layout>
   <div class="text-2xl text-center mt-4">
    <h1>
      IMPORTAR DATOS
    </h1>
   </div>
      <div class="flex justify-end py-4 ">
        <form action="{{ route('import.data') }}" onsubmit="return importarDatos()" method="get" menctype="multipart/form-data">
          @csrf
          
            <input type="file" name="documento">
            <x-primary-button class="ml-2 bg-cyan-300" onclick="importarDatos()">Importar</x-primary-button>
        </form>
        <form action="{{ route('/exportar') }}" onsubmit="return exportar()" method="get" menctype="multipart/form-data">
            <x-primary-button class="ml-2 bg-green-400 outline-none"  onclick="exportar()">Exportar </x-primary-button>
        </form>
      </div>
   
      <livewire:usuarios_gs-table/>
      
  <script src="/resources/js/script.js"></script>
</x-app-layout>


@endsection

