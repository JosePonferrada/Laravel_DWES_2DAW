<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostrar detalles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Estos son los detalles de la película') }} <strong>{{ $arrayPeliculas->title }}</strong>
                </div>
                    @if (session('msg') == 1)
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">La película se ha alquilado correctamente.</span>
                        </div>
                    @elseif (session('msg') == 4)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Gracias!</strong>
                            <span class="block sm:inline">La película se ha devuelto.</span>
                        </div>
                    @elseif (session('msg') == 2)
                        {{-- Película editada correctamente --}}
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">La película se ha editado correctamente.</span>
                        </div>
                    @elseif (session('msg') == 3)
                        {{-- Película eliminada correctamente --}}
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">La película se ha eliminado correctamente.</span>
                        </div>
                    @elseif (session('msg') == 5)
                        {{-- Película añadida correctamente --}}
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">La película se ha añadido correctamente.</span>
                        </div>
                    @endif
                    
                {{-- @endisset(session('msg') == 1)
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">¡Éxito!</strong>
                        <span class="block sm:inline">La película se ha alquilado correctamente.</span>
                    </div>
                @elseif (session('msg') == 2)
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">¡Gracias!</strong>
                        <span class="block sm:inline">La película se ha devuelto.</span>

                    </div>
                @endif --}}
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-rows-1">
                        <div class="grid grid-cols-2">
                            <div>
                                <img src="{{ $arrayPeliculas->poster }}" style="height: 500px" class="mx-auto block">
                            </div>
                            <div>
                                <h3 class="text-5xl font-extrabold">{{ $arrayPeliculas->title }}</h3>
                                <p class="mt-3 text-2xl">
                                    <strong>Año:</strong> {{ $arrayPeliculas->year }} &nbsp;
                                    <strong>Director:</strong> {{ $arrayPeliculas->director }}
                                </p>
                                <p class="mt-5"><strong>Resumen:</strong> {{ $arrayPeliculas->synopsis }}</p>
                                @if ($arrayPeliculas->rented)
                                    <p class="mt-5 text-xl"><strong>Estado:</strong> Película alquilada actualmente</p>
                                    <form action="{{ url('/catalog/return/' . $arrayPeliculas->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 
                                            font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Devolver
                                            película</button>
                                    </form>
                                @else
                                    <p class="mt-5 mb-5 text-xl"><strong>Estado:</strong> Película disponible</p>
                                    <form action="{{ url('/catalog/rent/' . $arrayPeliculas->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 
                                            font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Alquilar
                                            película</button>
                                    </form>
                                @endif
                                <form action="{{ url('/catalog/delete/' . $arrayPeliculas->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 
                                        font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar
                                        película</button>
                                </form>

                                {{-- <a href="{{ url('/catalog/delete/' . $id) }}">
                                    <button type="button"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar
                                        película</button>
                                </a> --}}
                                <a href="{{ url('/catalog/edit/' . $id) }}">
                                    <button type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar
                                        película</button>
                                </a>
                                <a href="{{ url('/catalog') }}">
                                    <button type="button"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Volver
                                        al listado</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
