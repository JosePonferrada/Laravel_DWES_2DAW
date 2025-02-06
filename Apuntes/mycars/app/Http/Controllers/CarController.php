<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cars.index');
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
            'plate' => 'required|unique:cars,plate',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'last_inspection' => 'required|date',
            'price' => 'required|numeric',
            'photo' => 'required|image',
        ]);

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
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
