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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
