<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del coche') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Consulta los detalles del coche') }}
                </div>


                <div class="p-6 bg-white border-b border-gray-200">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ asset($url . $car->photo) }}" target="_blank"><img class="rounded-t-lg"
                                src="{{ asset($url . $car->photo) }}" alt="" /></a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $car->brand . ' ' . $car->model }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                La matrícula es: {{ $car->plate }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                El color es: {{ $car->color }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                El año de matriculación es: {{ $car->year }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                El precio es: {{ $car->price }} €</p>

                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                La última revisión fue el: {{ $car->last_inspection }}
                            </p>
                            <a href="#"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
