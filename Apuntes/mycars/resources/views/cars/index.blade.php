<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis coches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Visualiza tus coches") }}
                    @if (session('msg'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            {{ session('msg') }} <span class="font-medium">Enhorabuena!👍</span>
                        </div>
                    @endif                        
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Marca</th>
                                <th class="px-4 py-2">Modelo</th>
                                <th class="px-4 py-2">Año</th>
                                <th class="px-4 py-2">Matrícula</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td class="border px-4 py-2">{{ $car->brand }}</td>
                                    <td class="border px-4 py-2">{{ $car->model }}</td>
                                    <td class="border px-4 py-2">{{ $car->year }}</td>
                                    <td class="border px-4 py-2">{{ $car->plate }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cars.show', $car->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                        <a href="{{ route('cars.edit', $car->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <a href="{{ route('cars.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Añadir coche</a>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
