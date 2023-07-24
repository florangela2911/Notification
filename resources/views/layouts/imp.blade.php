<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIREB LTDA</title>
    <link rel="shortcut icon" href="/Img/favicon.png">

    @yield('css')
</head>
<body>

        @yield('content')

        <livewire:datatable
        [model = "App/Models/User", searchable="name"]>

        @yield('js')
</body>
</html>
