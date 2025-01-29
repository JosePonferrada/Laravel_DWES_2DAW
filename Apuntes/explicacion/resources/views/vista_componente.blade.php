<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    
    {{-- <x-alert colortext="blue" colorbg="indigo"/> <!-- Aquí se incluye el componente Alert (Los componentes comienzan por x-) -->    
    <x-alert colortext="green" /> 
    <x-alert /> <!-- Si no se pasa ningún parámetro, se toman los valores por defecto -->
 --}}

    <?php 
    $color = "red";
    $tipoalerta = "alert";
    ?>


    <x-alert :colortext="$color" colorbg="yellow" class="text-amber-700"> {{-- Se pueden pasar variables a los componentes con :variable="$variable" --}}
        {{-- En $attributes se guardan las clases o atributos que para que puedan usarse luego --}}
        <!-- Todo lo que se ponga aquí se pasa al componente como una variable llamada $slot -->
        <h1 class="flex items-center text-5xl font-extrabold dark:text-white">CUIDADO!!!!!!!!!!!!</h1>
        <x-slot name="texto"> <!-- Se puede cambiar el nombre de la variable $slot y así usamos los $slot que sean necesarios -->
            <p class="text-lg font-semibold dark:text-gray-200">Este mensaje va en un slot con nombre</p>
        </x-slot>

    </x-alert>
{{-- 
    <x-alert2 colortext="red" /> {{-- Llamamos al componente alert2 

    <x-alert2 /> {{-- Llamamos al componente alert2, en este caso pillará el color del texto que tenga definido por defecto --}}

    <x-alert2>
        {{-- Lo que pongamos aquí será lo que mostrará el componente en el slot --}}
        <h1 class="flex items-center text-2xl font-extrabold dark:text-white">Título de la alerta</h1>
        <x-slot name="entrada1"> <!-- Se puede cambiar el nombre de la variable $slot y así usamos los $slot que sean necesarios -->
            Entrada 1
        </x-slot>

        <x-slot name="entrada2"> <!-- Se puede cambiar el nombre de la variable $slot y así usamos los $slot que sean necesarios -->
            Entrada 2
        </x-slot>

        <x-slot name="entrada3"> <!-- Se puede cambiar el nombre de la variable $slot y así usamos los $slot que sean necesarios -->
            Entrada 3
        </x-slot>

    </x-alert2>

    <x-dynamic-component :component="$tipoalerta"> <!-- Llamamos al componente dinámico y le pasamos el nombre del componente que queremos mostrar -->
        CUIDADO!!!!!
        <x-slot name="texto"> <!-- Se puede cambiar el nombre de la variable $slot y así usamos los $slot que sean necesarios -->
            <p>Esto es un componente dinámico</p>
        </x-slot>
    </x-dynamic-component>
    
</body>
</html>