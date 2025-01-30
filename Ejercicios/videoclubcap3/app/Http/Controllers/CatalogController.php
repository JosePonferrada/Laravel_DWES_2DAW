<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{

    //La funcion getIndex() devuelve la vista catalog.index con el array de peliculas
    public function getIndex()
    {
        //$todasPeliculas = Movie::all();
        return view('catalog.index')->with('arrayPeliculas', DB::table('movies')->get());
    }

    public function getShow($id = 1)
    {
        //return view('catalog.show')->with('arrayPeliculas', $this->arrayPeliculas[$id])->with('id', $id);
        // Obtenemos la pelicula con el id mediante findOrFail
        // Obtener la película con findOrFail (lanza error 404 si no existe)
        $pelicula = Movie::findOrFail($id);

        return view('catalog.show', ['arrayPeliculas' => $pelicula])->with('id', $id);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id = 1)
    {
        //return view('catalog.edit')->with('arrayPeliculas', DB::table('movies')->where('id', $id)->get())->with('id', $id);
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', ['arrayPeliculas' => $pelicula])->with('id', $id);
    }

    public function postCreate(Request $request)
    {
        $pelicula = new Movie();
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        return view('/catalog', ['arrayPeliculas' => $pelicula])->with('id', $pelicula->id);
    }

    public function putEdit(Request $request, $id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        // Devolvemos la vista de la película editada
        return view('catalog.show', ['arrayPeliculas' => $pelicula])->with('id', $id)->with('msg', 2);
    }

    public function putRent($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 1;
        $pelicula->save();
        return redirect('/catalog/show/' . $id)->with('msg', 1);
    }

    public function putReturn($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = 0;
        $pelicula->save();
        return redirect('/catalog/show/' . $id)->with('msg', 0);
    }

    public function deleteMovie($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->delete();
        return redirect('/catalog')->with('msg', 3);
    }

}
