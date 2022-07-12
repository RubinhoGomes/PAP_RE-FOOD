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

Route::post('/grafico', function () {
    $geral = Geral::all();
    return view('home.graphs', compact('geral'));
});

Auth::routes();

// DashBoard / BackOffice

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


// ** ** ** ** **

// Rotas / BackOffice

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
//Show Rotas
Route::get('/rotas/show', [App\Http\Controllers\RotasController::class, 'show']);

//Mostrar Grafico Rotas
Route::post('/rotas/rotas/', [App\Http\Controllers\RotasController::class, 'indexGraphs'])->name('rotasGraphs');


// ** ** ** ** **

// Refeições / BackOffice
// Refeições Listar

Route::get('/refeicoes', [App\Http\Controllers\RefeicoesController::class, 'index'])->name('refeicoes');

//Criar Refeições

Route::get('/refeicoes/create', [App\Http\Controllers\RefeicoesController::class, 'create'])->name('refeicoes.create');

//Guardar Refeições

Route::post('/refeicoes', [App\Http\Controllers\RefeicoesController::class, 'store']);

//Form Edit Refeições

Route::get('/refeicoes/edit/{refeicoes}', [App\Http\Controllers\RefeicoesController::class, 'edit']);

//Update Refeições

Route::put('/refeicoes/{refeicoes}', [App\Http\Controllers\RefeicoesController::class, 'update']);

//Delete Refeições

Route::delete('/refeicoes/{refeicoes}', [App\Http\Controllers\RefeicoesController::class, 'destroy']);

// Refeições / FrontOffice
//Show Refeições

Route::get('/refeicoes/show', [App\Http\Controllers\RefeicoesController::class, 'show']);

//Mostrar Grafico Refeicoes
Route::post('/refeicoes/refeicoes/', [App\Http\Controllers\RefeicoesController::class, 'indexGraphs'])->name('refeicoesGraphs');



// ** ** ** ** **

// Donativos / BackOffice
// Donativos Listar

Route::get('/donativos', [App\Http\Controllers\DonativosController::class, 'index'])->name('donativos');

//Criar Donativos

Route::get('/donativos/create', [App\Http\Controllers\DonativosController::class, 'create'])->name('donativos.create');

//Guardar Donativos

Route::post('/donativos', [App\Http\Controllers\DonativosController::class, 'store']);

//Form Edit Donativos

Route::get('/donativos/edit/{donativos}', [App\Http\Controllers\DonativosController::class, 'edit']);

//Update Donativos

Route::put('/donativos/{donativos}', [App\Http\Controllers\DonativosController::class, 'update']);

//Delete Donativos

Route::delete('/donativos/{donativos}', [App\Http\Controllers\DonativosController::class, 'destroy']);

// Donativos / FrontOffice
//Show Donativos

Route::get('/donativos/show', [App\Http\Controllers\DonativosController::class, 'show']);

//Mostrar Grafico Donativos
Route::post('/donativos/donativos/', [App\Http\Controllers\DonativosController::class, 'indexGraphs'])->name('donativosGraphs');



// ** ** ** ** **

// Despesas / BackOffice
// Despesas Listar

Route::get('/despesas', [App\Http\Controllers\DespesasController::class, 'index'])->name('despesas');

//Criar Despesas

Route::get('/despesas/create', [App\Http\Controllers\DespesasController::class, 'create'])->name('despesas.create');

//Guardar Despesas

Route::post('/despesas', [App\Http\Controllers\DespesasController::class, 'store']);

//Form Edit Despesas

Route::get('/despesas/edit/{despesas}', [App\Http\Controllers\DespesasController::class, 'edit']);

//Update Despesas

Route::put('/despesas/{despesas}', [App\Http\Controllers\DespesasController::class, 'update']);

//Delete Despesas

Route::delete('/despesas/{despesas}', [App\Http\Controllers\DespesasController::class, 'destroy']);

// Despesas / FrontOffice
//Show Despesas

Route::get('/despesas/show', [App\Http\Controllers\DespesasController::class, 'show']);

//Mostrar Grafico Rotas
Route::post('/despesas/despesas/', [App\Http\Controllers\DespesasController::class, 'indexGraphs'])->name('despesasGraphs');
