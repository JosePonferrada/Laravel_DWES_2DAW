<h1>Listado de frutas</h1>
<ul>
    @foreach ($frutas as $f)
        <li>{{ $f }}</li>
    @endforeach
</ul>
<hr>
<a href="{{ route('peras') }}">Ir a peras</a><br>
<a href="{{ route('naranjas') }}">Ir a naranjas</a>

<hr>
<button type="button"><a href="{{ url('fruteria/peras') }}">Ir a peras</a></button>
<button type="button"><a href="{{ url('fruteria/naranjas') }}">Ir a naranjas</a></button>
<hr>
<a href="{{ url('fruteria/peras') }}">Ir a peras</a><br>
<a href="{{ url('fruteria/naranjas') }}">Ir a naranjas</a>

{{-- Para poner un país a las naranjas --}}
@php
    $pais = 'Italia';
@endphp
<hr><br>
<button type="button"><a href="{{ url('fruteria/naranjas/' . $pais) }}">Ir a naranjas de {{ $pais }}</a></button>

{{-- Para pasar parámetros a la ruta --}}
<button type="button"><a href="{{ route('naranjas', ['pais' => 'Italia']) }}">Ir a naranjas de Italia</a></button>

<h1>Formulario de registro de frutas</h1>
<form action="" method="post">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <h2>Errores en el formulario:</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <p>
        <label for="nombre">Nombre de la fruta</label><br>
        <input type="text" name="nombre" id="nombre" value=@if(!$errors->has('nombre')) {{ old('nombre') }} @endif >
        {{-- Errores obtenidos por first solo muestran el primer error de ese campo --}}
        @if ($errors->has('nombre'))
            <p style="color: red">{{ $errors->first('nombre') }}</p>
        @endif
        {{-- Errores obtenidos por get solo muestran los errores de ese campo --}}
        @if ($errors->has('nombre'))
            @foreach ($errors->get('nombre') as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif

    </p>
    @if (session('mensaje'))
        <p style="color: red">{{ session('mensaje') }}</p>
    @endif
    <p>
        <label for="descripcion">Descripción de la fruta</label><br>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10">{{ old('descripcion') }}</textarea>
    </p>
    {{-- Existe también una directiva de Blade para mostrar el primer error de un campo con @error('NombreDelCampo') --}}
    @error('descripcion')
        <p style="color: red">{{ $message }}</p>
    @enderror
    <p>
        <label for="pais">País de origen</label><br>
        <input type="checkbox" name="pais[]" id="pais" @if (in_array('España', old('pais', []))) checked @endif
            value="España">España
        <input type="checkbox" name="pais[]" id="pais" value="Italia">Italia
        <input type="checkbox" name="pais[]" id="pais" value="Francia">Francia
    </p>
    <button type="submit">Guardar fruta</button>
</form>
