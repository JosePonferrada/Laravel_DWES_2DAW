<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar película') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Edita la película') }} <strong>{{ $arrayPeliculas->title }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ url('/catalog/edit/' . $id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="titulo"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Título</label>
                            <input type="text" id="titulo" name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nombre de la película" value="{{ $arrayPeliculas->title }}" required />
                        </div>
                        <div class="mb-6">
                            <label for="anio"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Año</label>
                            <input type="text" id="anio" name="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Año de la película" value="{{ $arrayPeliculas->year }}" required />
                        </div>
                        <div class="mb-6">
                            <label for="direct"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Director</label>
                            <input type="text" id="direct" name="director"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Director de la película" value="{{ $arrayPeliculas->director }}"
                                required />
                        </div>
                        <div class="mb-6">
                            <label for="cover"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Póster</label>
                            <input type="text" id="cover" name="poster"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="URL del póster de la película" value="{{ $arrayPeliculas->poster }}"
                                required />
                        </div>
                        <div class="mb-6">
                            <label for="sinopsis"
                                class="block mb-2 font-medium text-gray-900 dark:text-white">Resumen</label>
                            <textarea id="sinopsis" rows="4" name="synopsis"
                                class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Resumen de la película...">{{ $arrayPeliculas->synopsis }}</textarea>
                        </div>
                        <div class="flex justify-end">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar
                                    película</button>                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
