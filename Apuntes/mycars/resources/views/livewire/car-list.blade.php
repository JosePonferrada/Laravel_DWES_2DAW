<div>
    <h1 class="text-xl font-bold">Mis coches</h1>
    <p class="text-gray-500">El usuario logueado es: {{ $name }}</p>
    <!-- Aquí se mostrará la tabla con todos los coches -->

    <!-- Vamos a insertar un campo de búsqueda -->
    <div class="px-0 py-4 text-right">
        <input type="text" class="p-2 border rounded-lg" placeholder="Buscar..." wire:model.live='buscador'>
        {{-- $buscador --}}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        @if ($cars->count())
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'id')
                        bg-gray-200">

                        @else 
                        ">
                    
                    @endif
                        <div class="flex items-center">

                            ID
                            <a href="#" wire:click="sortBy('id')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>
                        </div>

                    </th>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'plate')
                        bg-gray-200">
                        @else
                        ">

                    @endif
                        <div class="flex items-center">

                            Matricula
                            <a href="#" wire:click="sortBy('plate')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>
                        </div>

                    </th>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'brand')
                        bg-gray-200">
                        @else
                        ">
                    @endif
                        <div class="flex items-center">
                            Marca
                            <a href="#" wire:click="sortBy('brand')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'model')
                        bg-gray-200">
                        @else
                        ">
                    @endif
                        <div class="flex items-center">
                            Modelo
                            <a href="#" wire:click="sortBy('model')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'year')
                        bg-gray-200">
                        @else
                        ">
                    @endif
                        <div class="flex items-center">
                            Año
                            <a href="#" wire:click="sortBy('year')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'color')
                        bg-gray-200">
                        @else
                        ">
                    @endif
                        <div class="flex items-center">
                            Color
                            <a href="#" wire:click="sortBy('color')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'last_inspection')
                        bg-gray-200">
                        @else
                        ">
                    @endif
                        <div class="flex items-center">
                            Fecha última revisión
                            <a href="#" wire:click="sortBy('last_inspection')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3
                    @if ($field === 'price')
                        bg-gray-200">
                        @else
                        ">
                    @endif
                        <div class="flex items-center">
                            Price
                            <a href="#" wire:click="sortBy('price')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $car->id }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $car->plate }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $car->brand }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $car->model }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $car->year }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $car->color }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $car->last_inspection }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $car->price }}
                        </td>
                        
                    </tr>
                
                @endforeach
            </tbody>
        </table>
        <div class="p-4">   <!-- Si lo ponemos aquí nos ahorramos el if de abajo -->
            {{ $cars->links() }} <!-- Así recarga todo, para que haga solo la actualización del componente nos vamos a la clase -->
        </div>
        @else
            <div class="p-4">
                No hay coches que mostrar con el filtro introducido.
            </div>
        @endif
        {{-- @if ($cars->hasPages()) 
            <div class="p-4">
                {{ $cars->links() }} <!-- Así recarga todo, para que haga solo la actualización del componente nos vamos a la clase -->
            </div>
        @endif --}}
    </div>

    <div class="mt-4">
        @livewire('create-car')
    </div>

</div>
