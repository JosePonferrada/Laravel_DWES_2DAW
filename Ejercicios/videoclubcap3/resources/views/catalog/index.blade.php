<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catálogo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Listado de películas') }}
                </div>
                @if (session('msg') == 3)
                {{-- Película eliminada correctamente --}}
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">La película se ha eliminado correctamente.</span>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="grid grid-cols-4">
                    @foreach ($arrayPeliculas as $key => $pelicula)
                        <div class="text-center">
                            <a href="{{ url('catalog/show/' . $pelicula->id) }}">
                                <img src="{{ $pelicula->poster }}" class="h-[350px] mx-auto block">
                                <h4 class="min-h-[45px] mt-1 mb-2"> {{ $pelicula->title }} </h4>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
