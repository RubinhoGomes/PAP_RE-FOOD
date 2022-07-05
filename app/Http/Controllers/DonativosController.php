<?php

namespace App\Http\Controllers;

use App\Models\Donativos;
use Illuminate\Http\Request;

class DonativosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Buscar dados a base de dados
        $donativos = Donativos::all(); //Select * from Donativos
        return view('donativos.index', compact('donativos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $donativos = Donativos::all(); //Select * from Donativos
        return view('donativos.create', compact('donativos'));
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
            'ValDon' => 'required',
            'ValNPer' => 'required',
            'ValCons' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $donativos = new Donativos();
        $donativos->valorDinheiro = request('ValDon'); //vai buscar ao form
        $donativos->valorNaoPerciveis = request('ValNPer');
        $donativos->valorConsumiveis = request('ValCons');
        $donativos->mes = request('mes');
        $donativos->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $donativos->save();
        return redirect('/donativos')->with('message', 'Donativo inserido com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donativos  $donativos
     * @return \Illuminate\Http\Response
     */
    public function show(Donativos $donativos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donativos  $donativos
     * @return \Illuminate\Http\Response
     */
    public function edit(Donativos $donativos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donativos  $donativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donativos $donativos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donativos  $donativos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donativos $donativos)
    {
        //
    }
}
