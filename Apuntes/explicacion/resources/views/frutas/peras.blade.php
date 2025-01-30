@if (isset($frutas))
    @foreach ($frutas as $fruta)
        <p>Nombre: {{ $fruta->nombre }}</p>
        <p>Temporada: {{ $fruta->temporada }}</p>
        <p>País: {{ $fruta->pais }}</p>
        ===============================
    @endforeach
@endif

{{-- Para mostrar solo un registro por el find() --}}
<p>Nombre: {{ $fruta->nombre }}</p>
<p>Temporada: {{ $fruta->temporada }}</p>
<p>País: {{ $fruta->pais }}</p>
