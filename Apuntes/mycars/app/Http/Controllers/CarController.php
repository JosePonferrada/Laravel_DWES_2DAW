<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $allCars = $user->cars()->orderBy('plate', 'asc')->get();
        return view('cars.index')->with('cars', $allCars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate' => 'required|unique:cars,plate,NULL,id,deleted_at,null', // El null es para que no tome en cuenta el id del registro actual
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'last_inspection' => 'required|date',
            'price' => 'required|numeric',
            'photo' => 'required|image',
        ]);

        try {
            $car = new Car();
            $car->plate = $request->plate;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->color = $request->color;
            $car->last_inspection = $request->last_inspection;
            $car->price = $request->price;
            $car->user_id = Auth::id();

            // Para guardar la imagen
            $nombreFoto = time() . '-' . $request->file('photo')->getClientOriginalName();
            $car->photo = $nombreFoto;

            $car->save();

            // Para guardar la imagen en el servidor
            $request->file('photo')->storeAs('img_cars', $nombreFoto);

            return to_route('cars.index')->with('msg', 'Coche guardado correctamente');
        } catch (QueryException $e) {
            return to_route('cars.index')->with('msg', 'Error al guardar el coche');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        // También se puede hacer con el id obtenido de la URL con el método find
        // $car = Car::find($id);
        $url = 'storage/img_cars/';
        return view('cars.show')->with('car', $car)->with('url', $url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $url = 'storage/img_cars/';
        return view('cars.edit')->with('car', $car)->with('url', $url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'plate' => 'required|unique:cars,plate,'.$car->id.',id,deleted_at,null', // Comprueba que la matrícula sea única, excepto en el registro actual
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'last_inspection' => 'required|date',
            'price' => 'required|numeric',
            'photo' => 'image',
        ]);

        try {
            
            $car->plate = $request->plate;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->color = $request->color;
            $car->last_inspection = $request->last_inspection;
            $car->price = $request->price;

            // Para guardar la imagen si se ha subido una nueva
            if (is_uploaded_file($request->file('photo'))) {
                // Borramos la imagen anterior
                Storage::delete('img_cars/' . $car->photo);
                $nombreFoto = time() . '-' . $request->file('photo')->getClientOriginalName();
                $car->photo = $nombreFoto;
                // Para guardar la imagen en el servidor
                $request->file('photo')->storeAs('img_cars', $nombreFoto);
            }

            $car->save();

            return to_route('cars.index')->with('msg', 'Coche editado correctamente');
        } catch (QueryException $e) {
            return to_route('cars.index')->with('msg', 'Error al editar el coche');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        try {
            $car->delete();
            return to_route('cars.index')->with('msg', 'Coche eliminado correctamente');
        } catch (Exception $e) {
            return to_route('cars.index')->with('msg', 'Error al eliminar el coche');
        }
    }
}
