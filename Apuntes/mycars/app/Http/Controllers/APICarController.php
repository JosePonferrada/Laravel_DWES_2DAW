<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class APICarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCars = Car::orderBy('plate', 'asc')->get();
        return response()->json(['status' => 'true', 'cars' => $allCars, 'message' => 'Lista de coches'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Si queremos validar los datos que nos llegan lo podemos hacer con el método validate
        $car = Car::create($request->all());
        return response()->json(['status' => 'true', 'car' => $car, 'message' => 'Coche creado'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        if ($car) {
            return response()->json(['status' => 'true', 'car' => $car, 'message' => 'Coche encontrado'], 200);
        } else {
            return response()->json(['status' => 'false', 'message' => 'Coche no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::find($id);
        if ($car) {
            $car->update($request->all());
            return response()->json(['status' => 'true', 'car' => $car, 'message' => 'Coche actualizado'], 200);
        } else {
            return response()->json(['status' => 'false', 'message' => 'Coche no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        if ($car) {
            $car->delete();
            return response()->json(['status' => 'true', 'message' => 'Coche eliminado'], 200);
        } else {
            return response()->json(['status' => 'false', 'message' => 'Coche no encontrado'], 404);
        }
    }
}
