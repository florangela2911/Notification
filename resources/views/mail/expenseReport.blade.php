@extends('layouts.imp')
@section('content')

<x-app-layout>
    <div class="py-4">
    <div class="card m-5">
      <div class="card-body">
        <div>

          <p>
              Buen dia, 

              Me permito informar que la cita solicitada para el paciente {{$base-> historia}}. quedo asignada de la siguente manera: <br>
          </p>
          <p>
              Servicio: {{$base->procedim }} <br>
              Fecha: {{$base->fechacita}} <br>
              Hora: {{$base->horacita}} <br>
              Profesional: {{$base->nombre }} <br>
              Sede: {{$base->sede }} <br>
              Direccion: {{$base->direccion }} <br>
          </p>
          <b>
              Recuerde llevar la documentacion completa, feliz dia!!
          </b>
      </div>
     </div>
    </div>
   </div> 

  <script src="/resources/js/script.js"></script>
</x-app-layout>


@endsection

