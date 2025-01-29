<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel - @yield('title')</title>
</head>
<body>
    @section('header')
        @include('layouts.cabecera')
    @show

    <div>
        @yield('content')
    </div>

    @section('footer')
        Footer de la plantilla maestra
    @show
</body>
</html>