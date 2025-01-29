<div class="p-4 mb-4 text-sm text-{{ $colortext }}-800 rounded-lg bg-{{ $colorbg }}-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">{{ $slot }}</span> {{ $texto }}
    <p {{ $attributes }}>Creado por Comares</p>
    {{-- Para ejecutar la función o método tenemos que irnos al componente asociado a la clase --}}
    {{ $peligro() }}
</div>
