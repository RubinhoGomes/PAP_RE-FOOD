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
        $rotas = Rotas::select(DB::RAW("*"))->orderByRaw('id DESC')->get(); // Select * from rotas
        return view('rotas.index', compact('rotas'));
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
        $carrinhas = Carrinhas::all(); //Select * from Categorias
        $rotasG = Rotas::select(DB::RAW("*, count(id) AS totalViag, MONTH(rotas.data) AS Mes, YEAR(rotas.data) AS Ano, sum(kmChegada) AS totalKmChegada, sum(kmPartida) AS totalKmPartida"))->where(DB::RAW('YEAR(rotas.data)'), 'LIKE', '%' . (date('Y') - 1) . '%')->orderByRaw('id DESC')->groupBy(DB::RAW('id, mes'))->get(); // Select * from rotas
        $rotas = Rotas::select(DB::RAW("*, count(id) AS totalViag, MONTH(rotas.data) AS Mes, YEAR(rotas.data) AS Ano, sum(kmChegada) AS totalKmChegada, sum(kmPartida) AS totalKmPartida"))->where(DB::RAW('MONTH(rotas.data)'), 'LIKE', '%' . (date('m') - 1) . '%')->where(DB::RAW('YEAR(rotas.data)'), 'LIKE', '%' . date('Y') . '%')->orderByRaw('id DESC')->groupBy(DB::RAW('id, mes'))->get(); // Select * from rotas
        return view('rotas.show', compact('carrinhas', 'rotas', 'rotasG'));
    }

    public function search()
    {
        $mes = request('mes');
        $ano = request('ano');

        if ($ano == '') {
            $ano = date('Y') - 1;
        }

        $carrinhas = Carrinhas::all(); //Select * from Categorias
        $rotasG = Rotas::select(DB::RAW("*, count(id) AS totalViag, MONTH(rotas.data) AS Mes, YEAR(rotas.data) AS Ano, sum(kmChegada) AS totalKmChegada, sum(kmPartida) AS totalKmPartida"))->where(DB::RAW('YEAR(rotas.data)'), 'LIKE', '%' . $ano . '%')->orderByRaw('id DESC')->groupBy(DB::RAW('id, mes'))->get(); // Select * from rotas
        $rotas = Rotas::select(DB::RAW("*, count(id) AS totalViag, MONTH(rotas.data) AS Mes, YEAR(rotas.data) AS Ano, sum(kmChegada) AS totalKmChegada, sum(kmPartida) AS totalKmPartida"))->where(DB::RAW('MONTH(rotas.data)'), 'LIKE', '%' . $mes . '%')->where(DB::RAW('YEAR(rotas.data)'), 'LIKE', '%' . date('Y') . '%')->orderByRaw('id DESC')->groupBy(DB::RAW('id, mes'))->get(); // Select * from rotas
        return view('rotas.show', compact('carrinhas', 'rotas', 'rotasG'));
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
