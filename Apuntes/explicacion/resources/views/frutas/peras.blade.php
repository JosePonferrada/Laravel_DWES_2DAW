@foreach ($frutas as $fruta)
<p>Nombre: {{ $fruta->nombre }}</p>
<p>Temporada: {{ $fruta->temporada }}</p>
<p>País: {{ $fruta->pais }}</p>
===============================
@endforeach