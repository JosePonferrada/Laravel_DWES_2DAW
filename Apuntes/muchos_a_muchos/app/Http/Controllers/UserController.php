<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $profesor = User::find(Auth::id());
        //$alumnos = $profesor->students; // Devuelve una colección de alumnos que tiene el profesor logueado con sus respectivas notas y asignaturas
        //$alumnos = $profesor->students()->where('nota', '>', 7)->get(); // Para filtrar los alumnos que tienen una nota mayor a 7
        //$alumnos = $profesor->students()->where('nota', '>', 7)->get(); // Para filtrar los alumnos que tienen una nota mayor a 7
        // Si tenemos muchos alumnos y queremos paginarlos
        $alumnos = $profesor->students()->paginate(5);
        return view('profesor.index')->with('alumnos', $alumnos);
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

    public function nota() {
        $profesor = User::find(Auth::id());
        $alumnos = $profesor->uniqueStudents;
        return view('profesor.nota')->with('alumnos', $alumnos);
    }

    public function storeNota(Request $request) {
        /* $alumno = Student::find($request->alumno); // En el find se pone el name del campo del formulario 
        $alumno->profesores()->attach(Auth::id(), ['asignatura' => $request->asignatura, 'nota' => $request->nota]); */

        // Para hacerlo mediante el profesor
        $profesor = User::find(Auth::id());
        $profesor->students()->attach($request->alumno, ['asignatura' => $request->asignatura, 'nota' => $request->nota]);
        return to_route('profesor.index');
    }
}
