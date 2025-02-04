<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('profesor.index');
    }

    public function create()
    {
        return view('profesor.create');
    }

    public function store(Request $request)
    {
        $newAlumno = new Student();
        $newAlumno->dni = $request->dni;
        $newAlumno->name = $request->name;
        $newAlumno->surname = $request->surname;
        $newAlumno->email = $request->email;
        $newAlumno->curso = $request->curso;
        $newAlumno->save();
        $newAlumno->profesores()->attach(Auth::id(), ['asignatura' => $request->asignatura, 'nota' => $request->nota]);
        return to_route('profesor.index');
    }
}
