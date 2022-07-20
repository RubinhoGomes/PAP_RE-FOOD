<?php

namespace App\Http\Controllers;

use App\Models\Donativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $donativos = DB::table('donativos')->orderByRaw('id DESC')->get(); // Select * from Donativos
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
            'valDon' => 'required',
            'valNPer' => 'required',
            'valCons' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $donativos = new Donativos();
        $donativos->valorDinheiro = request('valDon'); //vai buscar ao form
        $donativos->valorNaoPerciveis = request('valNPer');
        $donativos->valorConsumiveis = request('valCons');
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
        $donativos = Donativos::where('mes', 'LIKE', '%' . (date('m') - 1) . '%')->where('ano', 'LIKE', '%' . date('Y') . '%')->get();
        $donativosG = Donativos::where('ano', 'LIKE', '%' . (date('Y') - 1) . '%')->get();
        return view('donativos.show', compact('donativos', 'donativosG'));
    }

    public function search(Donativos $donativos)
    {
        $mes = request('mes');
        $ano = request('ano');

        if ($ano == '') {
            $ano = date('Y') - 1;
        }
        if ($mes == '') {
            $mes = date('m') - 1;
        }

        $donativos = Donativos::where('mes', 'LIKE', '%' . $mes . '%')->where('ano', 'LIKE', '%' . date('Y') . '%')->get();
        $donativosG = Donativos::where('ano', 'LIKE', '%' . $ano . '%')->get();
        return view('donativos.show', compact('donativos', 'donativosG'));
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
        return view('donativos.edit', compact('donativos'));
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
        // Guarda na base de dados

        Request()->validate([
            'valDon' => 'required',
            'valNPer' => 'required',
            'valCons' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $donativos->valorDinheiro = request('valDon'); //vai buscar ao form
        $donativos->valorNaoPerciveis = request('valNPer');
        $donativos->valorConsumiveis = request('valCons');
        $donativos->mes = request('mes');
        $donativos->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $donativos->save();
        return redirect('/donativos')->with('message', 'Donativo inserido com sucesso');
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
        $donativos->delete();
        return redirect('/donativos')->with('message', 'Donativo eliminado com sucesso!');
    }
}
