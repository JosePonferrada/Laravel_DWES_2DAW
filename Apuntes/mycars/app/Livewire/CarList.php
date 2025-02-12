<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarList extends Component
{

    // Para acceder a los datos desde la vista, los tenemos que definir en el componente como propiedades públicas
    public $name;
    public $buscador;
    public $field = 'brand';
    public $direction = 'asc';

    public function render()
    {
        $cars = Car::where('brand', 'like', '%' . $this->buscador . '%')->orWhere('model', 'like', '%' . $this->buscador . '%')->orderBy($this->field, $this->direction)->get();
        return view('livewire.car-list')->with('cars', $cars);
    }

    public function sortBy($field)
    {
        $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        $this->field = $field;
    }

}
