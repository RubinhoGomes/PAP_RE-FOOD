<?php

namespace App\Http\Controllers;

use App\Models\Refeicoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RefeicoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Buscar dados a base de dados
        $refeicoes = DB::table('refeicoes')->orderByRaw('id DESC')->get(); // Select * from Refeições
        return view('refeicoes.index', compact('refeicoes'));
    }

    public function indexGraphs()
    {
        // Buscar dados a base de dados
        $refeicoes = Refeicoes::select(DB::RAW("id, count(id) AS totalRef, ano, mes, kgAssociacoes, kg2Associacoes, kgBenefeciarios"))->groupBy('id')->get(); // Select * from Refeições
        return view('refeicoes.refeicoes', compact('refeicoes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Da return ao formulario
        $refeicoes = Refeicoes::all(); // Select * from Refeições
        return view('refeicoes.create', compact('refeicoes'));
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
            'kgBen' => 'required',
            'kgAssoc' => 'required',
            'kgAssoc2' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $refeicoes = new Refeicoes();
        $refeicoes->kgBenefeciarios = request('kgBen'); //vai buscar ao form
        $refeicoes->kgAssociacoes = request('kgAssoc');
        $refeicoes->kg2Associacoes = request('kgAssoc2');
        $refeicoes->mes = request('mes');
        $refeicoes->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $refeicoes->save();
        return redirect('/refeicoes')->with('message', 'Refeição inserida com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refeicoes  $refeicoes
     * @return \Illuminate\Http\Response
     */
    public function show(Refeicoes $refeicoes)
    {
        //
        $refeicoesG = Refeicoes::select(DB::RAW("id, count(id) AS totalRef, ano, mes, kgAssociacoes, kg2Associacoes, kgBenefeciarios"))->where('ano', 'LIKE', '%' . (date('Y') - 1) . '%')->groupBy('id')->get();
        $refeicoes = Refeicoes::select(DB::RAW("id, count(id) AS totalRef, ano, mes, kgAssociacoes, kg2Associacoes, kgBenefeciarios"))->where('mes', 'LIKE', '%' . (date('m') - 1) . '%')->where('ano', 'LIKE', '%' . date('Y'))->groupBy('id')->get();
        return view('refeicoes.show', compact('refeicoes', 'refeicoesG'));
    }

    public function search()
    {
        $mes = request('mes');
        $ano = request('ano');

        if ($ano == '') {
            $ano = date('Y') - 1;
        }

        $refeicoesG = Refeicoes::select(DB::RAW("id, count(id) AS totalRef, ano, mes, kgAssociacoes, kg2Associacoes, kgBenefeciarios"))->where('ano', 'LIKE', '%' . $ano . '%')->groupBy('id')->get();
        $refeicoes = Refeicoes::select(DB::RAW("id, count(id) AS totalRef, ano, mes, kgAssociacoes, kg2Associacoes, kgBenefeciarios"))->where('mes', 'LIKE', '%' . $mes . '%')->where('ano', 'LIKE', '%' . date('Y'))->groupBy('id')->get();
        return view('refeicoes.show', compact('refeicoes', 'refeicoesG'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refeicoes  $refeicoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Refeicoes $refeicoes)
    {
        //
        return view('refeicoes.edit', compact('refeicoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refeicoes  $refeicoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refeicoes $refeicoes)
    {
        // Guarda na base de dados

        Request()->validate([
            'kgBen' => 'required',
            'kgAssoc' => 'required',
            'kgAssoc2' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $refeicoes->kgBenefeciarios = request('kgBen'); //vai buscar ao form
        $refeicoes->kgAssociacoes = request('kgAssoc');
        $refeicoes->kg2Associacoes = request('kgAssoc2');
        $refeicoes->mes = request('mes');
        $refeicoes->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $refeicoes->save();
        return redirect('/refeicoes')->with('message', 'Refeição atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refeicoes  $refeicoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refeicoes $refeicoes)
    {
        // Apaga da base de dados o registo
        $refeicoes->delete();
        return redirect('/refeicoes')->with('message', 'Refeição eliminada com sucesso!');
    }
}
