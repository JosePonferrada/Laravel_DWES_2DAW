<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis alumnos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($alumnos as $alumno)
                        <div class="mb-4">
                            <p class="text-lg font-bold">Nombre: {{ $alumno->name }}</p>
                            <p class="text-sm">Apellidos: {{ $alumno->surname }}</p>
                            <p class="text-sm">DNI: {{ $alumno->dni }}</p>
                            <p class="text-sm">Email: {{ $alumno->email }}</p>
                            <p class="text-sm">Curso: {{ $alumno->curso }}</p>
                            <p class="text-sm">Asignatura: {{ $alumno->pivot->asignatura }}</p>
                            <p class="text-sm">Nota: {{ $alumno->pivot->nota }}</p>
                        </div>
                    @endforeach
                    {{-- Para incluir la paginación de los resultados --}}
                    {{ $alumnos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
