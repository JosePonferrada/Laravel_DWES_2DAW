<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
})->name('inicio')->middleware('guest');
 */
// Para devolver la vista de inicio a través del método home de HomeController
Route::get('/', [App\Http\Controllers\HomeController::class, 'getHome'])->name('inicio')->middleware('guest');
/* 
Route::get('/catalog', function () {
    return view('catalog.index');
})->name('dashboard'); */

// Para llamar a la vista /catalog con el método index de CatalogController
Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('dashboard');

// Para llamar a la vista /catalog/show con el método show de CatalogController
Route::get('/catalog/show/{id?}', [CatalogController::class, 'getShow'])->name('show');

/* Route::get('/catalog/show/{id}', function ($id) {
    return view('catalog.show', ['id' => $id]);
})->name('show'); */

// Para llamar a la vista /catalog/create con el método create de CatalogController
Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->name('create');

/* Route::get('/catalog/create', function () {
    return view('catalog.create');
})->name('create'); */

// Para llamar a la vista /catalog/edit con el método edit de CatalogController
Route::get('/catalog/edit/{id?}', [CatalogController::class, 'getEdit'])->name('edit');

/* Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalog.edit', ['id' => $id]);
})->name('edit'); */

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
