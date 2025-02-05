<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ponle una nota a un alumno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('profesor.nota') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="alumno" class="block text-sm font-medium text-gray-700">Alumno</label>
                            <select name="alumno" id="alumno" class="form-select mt-1 block w-full">
                                @foreach ($alumnos as $alumno)
                                    <option value="{{ $alumno->id }}">{{ $alumno->name }} {{ $alumno->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="asignatura" class="block text-sm font-medium text-gray-700">Asignatura</label>
                            <input type="text" name="asignatura" id="asignatura" class="form-input mt-1 block w-full"
                                placeholder="Introduce la asignatura">
                        </div>
                        <div class="mb-4">
                            <label for="nota" class="block text-sm font-medium text-gray-700">Nota</label>
                            <input type="number" name="nota" id="nota" class="form-input mt-1 block w-full"
                                placeholder="Introduce la nota">
                        </div>
                        <button type="submit"
                            class="bg-blue-800 hover:bg-blue-700 font-bold py-2 px-4 rounded">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
