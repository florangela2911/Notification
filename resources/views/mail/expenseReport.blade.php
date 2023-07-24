<x-app-layout>
    <div class="py-4">
    <div class="card m-5">
      <div class="card-body">
        <div>

          <p>
              Buen dia,<br>

              Me permito informar que la cita solicitada para el paciente {{$row[2]}}. Quedo asignada de la siguiente manera: <br>
          </p>
          <p>
              Servicio: {{$row[15] }} <br>
              Fecha: {{$row[8]}} <br>
              Hora: {{$row[9]}} <br>
              Profesional: {{$row[11] }} <br>
              Sede: {{$row[32] }} <br>
              Direccion: {{$row[33] }} <br>
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

