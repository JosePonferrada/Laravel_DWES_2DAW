<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir alumno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('profesor.store') }}">
                        @csrf

                        <!-- DNI -->
                        <div>
                            <x-input-label for="dni" :value="__('DNI')" />
                            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni"
                                :value="old('dni')" required autofocus autocomplete="dni" />
                            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                        </div>

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Surname -->
                        <div>
                            <x-input-label for="surname" :value="__('Surname')" />
                            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                                :value="old('surname')" required autofocus autocomplete="surname" />
                            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        </div>

                        <!-- Especialidad -->
                        <div>
                            <x-input-label for="curso" :value="__('Curso')" />
                            <x-text-input id="curso" class="block mt-1 w-full" type="text" name="curso"
                                :value="old('curso')" required autofocus autocomplete="curso" />
                            <x-input-error :messages="$errors->get('curso')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Asignatura -->
                        <div>
                            <x-input-label for="asignatura" :value="__('Asignatura')" />
                            <x-text-input id="asignatura" class="block mt-1 w-full" type="text" name="asignatura"
                                :value="old('asignatura')" required autofocus autocomplete="asignatura" />
                            <x-input-error :messages="$errors->get('asignatura')" class="mt-2" />
                        </div>

                        <!-- Nota -->
                        <div>
                            <x-input-label for="nota" :value="__('Nota')" />
                            <x-text-input id="nota" class="block mt-1 w-full" type="text" name="nota"
                                :value="old('nota')" required autofocus autocomplete="nota" />
                            <x-input-error :messages="$errors->get('nota')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Añadir alumno') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
