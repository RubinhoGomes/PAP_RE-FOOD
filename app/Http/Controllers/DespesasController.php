<?php

namespace App\Http\Controllers;

use App\Models\Despesas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Selecionar todos os valores da base de dados
        $despesas = DB::table('despesas')->orderByRaw('id DESC')->get(); // Select * from Despesas
        return view('despesas.index', compact('despesas'));
    }

    public function indexGraphs()
    {
        //Selecionar todos os valores da base de dados
        $despesas = Despesas::select(DB::RAW("despesas.id, count(id) AS totalDesp, despesas.mes, despesas.ano, despesas.rendas, despesas.eletrecidade, despesas.agua, despesas.consumiveis, despesas.manutencao, despesas.equipamentos, despesas.outras"))->groupBy('id')->get(); // Select * from Refeições
        return view('despesas.despesas', compact('despesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $despesas = Despesas::all(); //Select * from Donativos
        return view('despesas.create', compact('despesas'));
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
            'valRenda' => 'required',
            'valElec' => 'required',
            'valAgua' => 'required',
            'valCons' => 'required',
            'valManu' => 'required',
            'valEquip' => 'required',
            'valOutros' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $despesas = new Despesas();
        $despesas->rendas = request('valRenda');
        $despesas->eletrecidade = request('valElec'); //vai buscar ao form
        $despesas->agua = request('valAgua');
        $despesas->consumiveis = request('valCons');
        $despesas->manutencao = request('valManu');
        $despesas->equipamentos = request('valEquip');
        $despesas->outras = request('valOutros');
        $despesas->mes = request('mes');
        $despesas->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $despesas->save();
        return redirect('/despesas')->with('message', 'Despesa inserida com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesas  $despesas
     * @return \Illuminate\Http\Response
     */
    public function show(Despesas $despesas)
    {
        //
        $despesas = Despesas::all();
        return view('despesas.show', compact('despesas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesas  $despesas
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesas $despesas)
    {
        //
        return view('despesas.edit', compact('despesas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despesas  $despesas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despesas $despesas)
    {
        // Guarda na base de dados

        Request()->validate([
            'valRenda' => 'required',
            'valElec' => 'required',
            'valAgua' => 'required',
            'valCons' => 'required',
            'valManu' => 'required',
            'valEquip' => 'required',
            'valOutros' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $despesas->rendas = request('valRenda');
        $despesas->eletrecidade = request('valElec'); //vai buscar ao form
        $despesas->agua = request('valAgua');
        $despesas->consumiveis = request('valCons');
        $despesas->manutencao = request('valManu');
        $despesas->equipamentos = request('valEquip');
        $despesas->outras = request('valOutros');
        $despesas->mes = request('mes');
        $despesas->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $despesas->save();
        return redirect('/despesas')->with('message', 'Despesa editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesas  $despesas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesas $despesas)
    {
        //
        $despesas->delete();
        return redirect('/despesas')->with('message', 'Despesa eliminada com sucesso!');
    }
}
