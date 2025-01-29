<?php

use App\Http\Controllers\FrutasController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Con route::view necesitamos pasarle la ruta y la vista que queremos cargar
//Route::view('/', 'welcome');

Route::get('contacto/{nombre?}/{edad?}', function ($nombre = 'Invitado', $edad = 18) {
//  return "Hola desde la página de contacto de $nombre de $edad años";

//  return view('contacto', ['nombre' => $nombre, 'edad' => $edad]);

//  También se puede hacer de la siguiente manera
//  return view('contacto', compact('nombre', 'edad'));

//  Otra forma de hacerlo
    return view('contact.contacto')->with(['nom' => $nombre, 'ed' => $edad, 'frutas' => ['Manzana', 'Pera', 'Naranja', 'Melón', 'Plátano']]);
})->name('contacto')->where(['nombre' => '[A-Za-z]+', 'edad' => '[0-9]+'])->middleware('mayor:18');

Route::post('contacto', function () {
    return "Hola desde la página de contacto por POST";
})->withoutMiddleware([ValidateCsrfToken::class]);

// Para cargar la vista hija
Route::view('child', 'child');

// Para cargar la vista del componente alert
Route::view('componente', 'vista_componente');

// Para cargar la vista de la página de frutas
//Route::get('frutas', 'FrutasController@index')->name('frutas');

// Otra manera de cargar la vista de la página de frutas
Route::get('frutas', [FrutasController::class, 'index'])->name('frutas');
//Route::post('frutas', [FrutasController::class, 'index'])->name('postfrutas');

/* Route::get('/naranjas/{pais?}', [FrutasController::class, 'naranjas'])->name('naranjas');
Route::get('/peras', [FrutasController::class, 'peras'])->name('peras');
 */
// Para crear un grupo de rutas con el mismo prefijo
Route::prefix('fruteria')->group(function () {
    Route::get('frutas', [FrutasController::class, 'index'])->name('frutas');
    Route::post('frutas', [FrutasController::class, 'index'])->name('postfrutas');
    Route::get('naranjas/{pais?}', [FrutasController::class, 'naranjas'])->name('naranjas');
    Route::get('peras', [FrutasController::class, 'peras'])->name('peras');
    Route::post('frutas', [FrutasController::class, 'store'])->name('store');
});
