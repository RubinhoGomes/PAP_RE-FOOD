<?php

use Illuminate\Support\Facades\Route;
use App\Models\Geral;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $geral = Geral::all();
    return view('home', compact('geral'));
});

Auth::routes();

// DashBoard / BackOffice

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


// ** ** ** ** **

// Rotas / BackOffice
// Rotas Listar

Route::get('/rotas', [App\Http\Controllers\RotasController::class, 'index'])->name('rotas');

//Criar Rotas

Route::get('/rotas/create', [App\Http\Controllers\RotasController::class, 'create'])->name('rotas.create');

//Guardar Rotas

Route::post('/rotas', [App\Http\Controllers\RotasController::class, 'store']);

//Form Edit Rotas

Route::get('/rotas/edit/{rotas}', [App\Http\Controllers\RotasController::class, 'edit']);

//Update Rotas

Route::put('/rotas/{rotas}', [App\Http\Controllers\RotasController::class, 'update']);

//Delete Rotas

Route::delete('/rotas/{rotas}', [App\Http\Controllers\RotasController::class, 'destroy']);

// Rotas / FrontOffice


// ** ** ** ** **

// Donativos / BackOffice
// Donativos Listar

// ** Route::get('/rotas', [App\Http\Controllers\RotasController::class, 'index'])->name('rotas');

//Criar Donativos

// ** Route::get('/rotas/create', [App\Http\Controllers\RotasController::class, 'create'])->name('rotas.create');

//Guardar Donativos

// ** Route::post('/rotas', [App\Http\Controllers\RotasController::class, 'store']);

//Form Edit Donativos

// **Route::get('/rotas/edit/{rotas}', [App\Http\Controllers\RotasController::class, 'edit']);

//Update Donativos

// ** Route::put('/rotas/{rotas}', [App\Http\Controllers\RotasController::class, 'update']);

//Delete Donativos

// ** Route::delete('/rotas/{rotas}', [App\Http\Controllers\RotasController::class, 'destroy']);

// Donativos / FrontOffice
