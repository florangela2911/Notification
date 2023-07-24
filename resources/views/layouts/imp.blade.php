<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIREB LTDA</title>
    <link rel="shortcut icon" href="/Img/favicon.png">
    

   
    {{--Datatables--}
    <link href="DataTables-1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <link href="Buttons-2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet"/>

    @yield('css')
    {{--Bootstrap--}}
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
</head>
<body>
   
        @yield('content')

            {{--Bootstrap--}}
        <script src="{{url('/assets/js/botstrap.bundle.min.js')}}"></script>

        <livewire:datatable 
        [model = "App/Models/User", searchable="name"]>
        
      

        
        @yield('js')


       {{--Responsive--}}
       <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js "></script>
       <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
   
       <script src="/resources/js/script.js"></script>
       
</body>
</html>