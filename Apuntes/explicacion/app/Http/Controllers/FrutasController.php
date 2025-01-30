<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormFrutasRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Fruta;
use Illuminate\Http\Request;

class FrutasController extends Controller
{
    //
    public function index(){
        return view('frutas.index')->with('frutas', ['Naranja', 'Pera', 'Manzana', 'Sandía', 'Melon', 'Piña']);
    }

    public function naranjas($pais = "España"){
        $frutas = DB::table('frutas')->get(); // Obtener todos los registros de la tabla frutas
        return view('frutas.naranjas')->with('frutas', $frutas); 
        //return "Naranjas de $pais";
    }

    public function peras(){
        $frutas = Fruta::all();
        return view('frutas.peras')->with('frutas', $frutas);
    }

    public function store(FormFrutasRequest $request){
        /* if ($request->input('nombre') != "Manzana") {
            return redirect()->route('frutas')->withInput()->with('mensaje', 'La fruta no es una manzana');
            // Se puede usar también 
            // return redirect()->back()->withInput();
        } */

        
        // Para definir mensajes de error personalizados se define un array con los mensajes y se pasa como segundo parámetro a validate
        /* $messages = [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre debe ser mayor de 5 caracteres',
        ]; */

        /* $request->validate([
            'nombre' => 'required|min:5|max:10|in:manzana,peras',
            'descripcion' => 'required|min:10|max:20',
            'pais' => 'required'
        ], $messages); */
        
        // Al tener el archivo FormFrutasRequest.php se tiene que hacer la validación de la siguiente manera
        $request->validated();

        return "Todo correcto";
        //return $request->all();
    }

}
