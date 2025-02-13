<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Car;
use Livewire\Attributes\Validate;

class CreateCar extends Component
{
    use WithFileUploads;

    public $show = false;

    #[Validate('required|unique:cars,plate,NULL,id,deleted_at,null|max:7')]
    public $plate;
    #[Validate('required')]
    public $brand;
    #[Validate('required')]
    public $model;
    #[Validate('required')]
    public $color;
    #[Validate('required|integer')]
    public $year;
    #[Validate('required|date')]
    public $last_inspection;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required|image')]
    public $photo;
    
    public function render()
    {
        return view('livewire.create-car');
    }

    public function showForm()
    {
        $this->show = $this->show ? false : true;
    }
    
    public function saveCar() {
        $this->validate(); // Valida todos los campos que tengan la directiva Validate
        $nombreFoto = time() . '-' . $this->photo->getClientOriginalName();
        // Para guardar la imagen en el servidor
        $this->photo->storeAs('img_cars', $nombreFoto);
        Car::create([
            'plate' => $this->plate,
            'brand' => $this->brand,
            'model' => $this->model,
            'color' => $this->color,
            'year' => $this->year,
            'last_inspection' => $this->last_inspection,
            'photo' => $nombreFoto,
            'price' => $this->price,
            'user_id' => Auth::id()
        ]);

        $this->show = false;
        $this->dispatch('alert');
        $this->reset('plate', 'brand', 'model', 'color', 'year', 'last_inspection', 'photo', 'price');
    }

}
