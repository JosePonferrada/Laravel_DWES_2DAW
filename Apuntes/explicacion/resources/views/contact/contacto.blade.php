<!-- Para incluir un fichero de la carpeta de views se hace con include -->
@include('layouts.cabecera')

<h1>Hola soy el contacto de {{ $nom }} y tengo {{ $ed }} años</h1>

<!-- Condicional para saber si es mayor de edad o no -->
@if ($ed >= 18)
    <h2>Es mayor de edad</h2>
@else
    <h2>Es menor de edad</h2>
@endif

<!-- Bucle para recorrer las frutas -->
<h2> Lista de frutas </h2>
<ul>
    @foreach ($frutas as $fruta)
        <li>{{ $fruta }}</li>
    @endforeach
</ul>