<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    //La funcion getIndex() devuelve la vista catalog.index con el array de peliculas
    public function getIndex()
    {
        return view('catalog.index')->with(DB::table('movies')->get());
    }

    public function getShow($id = 1)
    {
        //return view('catalog.show')->with('arrayPeliculas', $this->arrayPeliculas[$id])->with('id', $id);
        // Obtenemos la pelicula con el id mediante findOrFail
        return view('catalog.show')->with('arrayPeliculas', DB::table('movies')->where('id', $id)->get())->with('id', $id);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id = 1)
    {
        return view('catalog.edit')->with('arrayPeliculas', DB::table('movies')->where('id', $id)->get())->with('id', $id);
    }

}
