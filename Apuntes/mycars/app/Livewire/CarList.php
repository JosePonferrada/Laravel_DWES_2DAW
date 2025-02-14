<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[On('alert')]
class CarList extends Component
{

    use WithPagination, WithoutUrlPagination; // Para que la paginación funcione sin URL

    // Para acceder a los datos desde la vista, los tenemos que definir en el componente como propiedades públicas
    public $name;
    public $buscador;
    public $field = 'id';
    public $direction = 'asc';

    public function render()
    {
        $cars = Car::where('brand', 'like', '%' . $this->buscador . '%')->orWhere('model', 'like', '%' . $this->buscador . '%')->orderBy($this->field, $this->direction)->paginate(2);
        return view('livewire.car-list')->with('cars', $cars);
    }

    public function sortBy($field)
    {
        $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        $this->field = $field;
    }

    public function updatingBuscador()
    {
        $this->resetPage(); // Para que la paginación vuelva a la página 1, tras eso hace la búsqueda
        // Si usamos el updatedBuscador() en lugar de updatingBuscador(), la búsqueda se haría después de cambiar de página
    }

    /* public function updating($buscador) // También se puede hacer así
    {
        $this->resetPage(); // Para que la paginación vuelva a la página 1, tras eso hace la búsqueda
    } */

}
