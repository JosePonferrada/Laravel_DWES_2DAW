@extends('layouts.master')

@section('title', 'Prueba de plantillas')

@section('content')
    Aquí irá el contenido de la vista hija
@endsection

@section('footer')
    @parent <!-- Con esto se incluye el footer de la plantilla maestra -->
    <br>Footer de la vista hija
@endsection