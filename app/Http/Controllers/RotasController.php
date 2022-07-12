<?php

namespace App\Http\Controllers;

use App\Models\Carrinhas;
use App\Models\Rotas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Selecionar os vários valores da base de dados

        $rotas = Rotas::all(); // Select * from rotas
        return view('rotas.index', compact('rotas'));
    }

    public function indexGraphs()
    {
        // Selecionar os vários valores da base de dados

        $rotas = DB::select(DB::raw("SELECT count(id), carrinhas_id,EXTRACT(YEAR FROM rotas.data), EXTRACT(MONTH FROM rotas.data), sum(kmChegada) - sum(kmPartida) FROM refood.rotas GROUP BY month(data), carrinhas_id;"));
        return view('rotas.rotas', compact('rotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Selecionar todos os dados da base de dados referente as carrinhas para depois guardar

        $carrinhas = Carrinhas::all(); // Select * from Carrinhas
        return view('rotas.create', compact('carrinhas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guarda na base de dados

        Request()->validate([
            'motorista' => 'required',
            'carrinhas' => 'required',
            'numRota' => 'required',
            'kmPartida' => 'required',
            'kmChegada' => 'required',
            'horaPartida' => 'required',
            'horaChegada' => 'required',
            'data' => 'required',
            'observacoes' => 'required',

        ]);

        $rotas = new Rotas();
        $rotas->motorista = request('motorista'); //vai buscar ao form
        $rotas->carrinhas_id = request('carrinhas');
        $rotas->numRota = request('numRota');
        $rotas->kmPartida = request('kmPartida');
        $rotas->kmChegada = request('kmChegada');
        $rotas->HoraPartida = request('horaPartida');
        $rotas->horaChegada = request('horaChegada');
        $rotas->data = request('data');
        $rotas->observacoes = request('observacoes');

        /*$rotas->user_id = Auth::id(); */
        $rotas->save();
        return redirect('/rotas')->with('message', 'Rota inserida com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function show(Rotas $rotas)
    {
        //
        $carrinhas = Carrinhas::all(); //Select * from Categorias
        $rotas = Rotas::all(); //Select * from Categorias
        return view('rotas.show', compact('carrinhas', 'rotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function edit(Rotas $rotas)
    {
        //
        $carrinhas = Carrinhas::all(); //Select * from Categorias
        $rotas = Rotas::all();
        return view('rotas.edit', compact('carrinhas', 'rotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rotas $rotas)
    {
        // Da update a Rota que esta na base de dados

        Request()->validate([
            'motorista' => 'required',
            'carrinhas' => 'required',
            'numRota' => 'required',
            'kmPartida' => 'required',
            'kmChegada' => 'required',
            'horaPartida' => 'required',
            'horaChegada' => 'required',
            'data' => 'required',
            'observacoes' => 'required',

        ]);

        $rotas->motorista = request('motorista'); //vai buscar ao form
        $rotas->carrinhas_id = request('carrinhas');
        $rotas->numRota = request('numRota');
        $rotas->kmPartida = request('kmPartida');
        $rotas->kmChegada = request('kmChegada');
        $rotas->HoraPartida = request('horaPartida');
        $rotas->horaChegada = request('horaChegada');
        $rotas->data = request('data');
        $rotas->observacoes = request('observacoes');
        /*$rotas->user_id = Auth::id(); */
        $rotas->save();
        return redirect('/rotas')->with('message', 'Rota editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rotas $rotas)
    {
        //
        $rotas->delete();
        return redirect('/rotas')->with('message', 'Rotas eliminado com sucesso!');
    }
}
