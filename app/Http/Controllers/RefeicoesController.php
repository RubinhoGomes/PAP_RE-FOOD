<?php

namespace App\Http\Controllers;

use App\Models\Refeicoes;
use Illuminate\Http\Request;

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
        $refeicoes = Refeicoes::all(); // Select * from Refeições
        return view('refeicoes.index', compact('refeicoes'));
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
        $refeicoes = Refeicoes::all(); //Select * from Categorias
        return view('refeicoes.show', compact('refeicoes'));
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
