<?php

use Illuminate\Support\Facades\Route;
use App\Models\Geral;
use App\Http\Controllers\HomeController;

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
    $geralG = Geral::where('ano', 'LIKE', '%' . date('Y') - 1 . '%')->get();
    $geral = Geral::where('mes', 'LIKE', '%' . (date('m') - 1) . '%')->where('ano', 'LIKE', '%' . date('Y') . '%')->get();
    return view('home', compact('geral', 'geralG'));
});

Route::post('/', [App\Http\Controllers\HomeController::class, 'search'])->name('home');

Auth::routes();

// DashBoard / BackOffice

Route::get('/dashboard', [App\Http\Controllers\GeralController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [App\Http\Controllers\GeralController::class, 'search'])->name('dashboardG');

Route::get('/geral', [App\Http\Controllers\GeralController::class, 'index'])->middleware('auth')->name('geral');

Route::get('/geral/index', [App\Http\Controllers\GeralController::class, 'indexM'])->middleware('auth')->name('geral.index');

Route::get('/geral/create', [App\Http\Controllers\GeralController::class, 'create'])->middleware('auth')->name('geral.create');
Route::post('/geral', [App\Http\Controllers\GeralController::class, 'store'])->middleware('auth');

Route::get('/geral/edit/{geral}', [App\Http\Controllers\GeralController::class, 'edit'])->middleware('auth');
Route::put('/geral/{geral}', [App\Http\Controllers\GeralController::class, 'update'])->middleware('auth');

Route::delete('/geral/{geral}', [App\Http\Controllers\GeralController::class, 'destroy'])->middleware('auth');


// ** ** ** ** **

// Rotas / BackOffice

// ** ** ** ** **

Route::get('/rotas', [App\Http\Controllers\RotasController::class, 'index'])->middleware('auth')->name('rotas');

//Criar Rotas

Route::get('/rotas/create', [App\Http\Controllers\RotasController::class, 'create'])->middleware('auth')->name('rotas.create');

//Guardar Rotas

Route::post('/rotas', [App\Http\Controllers\RotasController::class, 'store'])->middleware('auth');

//Form Edit Rotas

Route::get('/rotas/edit/{rotas}', [App\Http\Controllers\RotasController::class, 'edit'])->middleware('auth');

//Update Rotas

Route::put('/rotas/{rotas}', [App\Http\Controllers\RotasController::class, 'update'])->middleware('auth');

//Delete Rotas

Route::delete('/rotas/{rotas}', [App\Http\Controllers\RotasController::class, 'destroy'])->middleware('auth');

// ** ** ** ** **

// Rotas / FrontOffice

//Show Rotas
Route::get('/rotas/show', [App\Http\Controllers\RotasController::class, 'show']);

Route::post('/rotas/show', [App\Http\Controllers\RotasController::class, 'search']);



// ** ** ** ** **

// Refeições / BackOffice

// ** ** ** ** **

// Refeições Listar

Route::get('/refeicoes', [App\Http\Controllers\RefeicoesController::class, 'index'])->middleware('auth')->name('refeicoes');

//Criar Refeições

Route::get('/refeicoes/create', [App\Http\Controllers\RefeicoesController::class, 'create'])->middleware('auth')->name('refeicoes.create');

//Guardar Refeições

Route::post('/refeicoes', [App\Http\Controllers\RefeicoesController::class, 'store'])->middleware('auth');

//Form Edit Refeições

Route::get('/refeicoes/edit/{refeicoes}', [App\Http\Controllers\RefeicoesController::class, 'edit'])->middleware('auth');

//Update Refeições

Route::put('/refeicoes/{refeicoes}', [App\Http\Controllers\RefeicoesController::class, 'update'])->middleware('auth');

//Delete Refeições

Route::delete('/refeicoes/{refeicoes}', [App\Http\Controllers\RefeicoesController::class, 'destroy'])->middleware('auth');


// ** ** ** ** **

// Refeições / FrontOffice

//Show Refeições

Route::get('/refeicoes/show', [App\Http\Controllers\RefeicoesController::class, 'show']);
Route::post('/refeicoes/show', [App\Http\Controllers\RefeicoesController::class, 'search']);



// ** ** ** ** **

// Donativos / BackOffice

// ** ** ** ** **

// Donativos Listar

Route::get('/donativos', [App\Http\Controllers\DonativosController::class, 'index'])->middleware('auth')->name('donativos');

//Criar Donativos

Route::get('/donativos/create', [App\Http\Controllers\DonativosController::class, 'create'])->middleware('auth')->name('donativos.create');

//Guardar Donativos

Route::post('/donativos', [App\Http\Controllers\DonativosController::class, 'store'])->middleware('auth');

//Form Edit Donativos

Route::get('/donativos/edit/{donativos}', [App\Http\Controllers\DonativosController::class, 'edit'])->middleware('auth');

//Update Donativos

Route::put('/donativos/{donativos}', [App\Http\Controllers\DonativosController::class, 'update'])->middleware('auth');

//Delete Donativos

Route::delete('/donativos/{donativos}', [App\Http\Controllers\DonativosController::class, 'destroy'])->middleware('auth');


// ** ** ** ** **

// Donativos / FrontOffice

//Show Donativos

Route::get('/donativos/show', [App\Http\Controllers\DonativosController::class, 'show']);
Route::post('/donativos/show', [App\Http\Controllers\DonativosController::class, 'search']);



// ** ** ** ** **

// Despesas / BackOffice

// ** ** ** ** **

// Despesas Listar

Route::get('/despesas', [App\Http\Controllers\DespesasController::class, 'index'])->middleware('auth')->name('despesas');

//Criar Despesas

Route::get('/despesas/create', [App\Http\Controllers\DespesasController::class, 'create'])->middleware('auth')->name('despesas.create');

//Guardar Despesas

Route::post('/despesas', [App\Http\Controllers\DespesasController::class, 'store'])->middleware('auth');

//Form Edit Despesas

Route::get('/despesas/edit/{despesas}', [App\Http\Controllers\DespesasController::class, 'edit'])->middleware('auth');

//Update Despesas

Route::put('/despesas/{despesas}', [App\Http\Controllers\DespesasController::class, 'update'])->middleware('auth');

//Delete Despesas

Route::delete('/despesas/{despesas}', [App\Http\Controllers\DespesasController::class, 'destroy'])->middleware('auth');


// ** ** ** ** **

// Despesas / FrontOffice

//Show Despesas

Route::get('/despesas/show', [App\Http\Controllers\DespesasController::class, 'show']);
Route::post('/despesas/show', [App\Http\Controllers\DespesasController::class, 'search']);

// ** ** ** ** **
