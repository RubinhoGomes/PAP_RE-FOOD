<?php

namespace App\Http\Controllers;

use App\Models\Geral;
use Illuminate\Http\Request;

class GeralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $geral = Geral::where('mes', 'LIKE', '%' . (date('m') - 1) . '%')->where('ano', 'LIKE', '%' . date('Y') . '%')->get();
        return view('dashboard', compact('geral'));
    }

    public function indexM()
    {
        $geral = Geral::all();
        return view('geral.index', compact('geral'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donativos = Geral::all(); //Select * from Donativos
        return view('geral.create', compact('donativos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate([
            'valBen' => 'required',
            'valFam' => 'required',
            'valVol' => 'required',
            'valFonA' => 'required',
            'valParS' => 'required',
            'valAssP' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $geral = new Geral();
        $geral->numBeneficiarios = request('valBen'); //vai buscar ao form
        $geral->numFamilias = request('valFam');
        $geral->numVoluntarios = request('valVol');
        $geral->numFontesAlimentos = request('valFonA');
        $geral->numParceirosSociais = request('valParS');
        $geral->numAssociacoesParceiras = request('valAssP');
        $geral->mes = request('mes');
        $geral->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $geral->save();
        return redirect('/dashboard')->with('message', 'Dados inserido com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Geral  $geral
     * @return \Illuminate\Http\Response
     */
    public function show(Geral $geral)
    {
        //
    }

    public function search()
    {
        $mes = request('mes');
        $ano = request('ano');

        if ($ano == '') {
            $ano = date('Y') - 1;
        }

        $geral = Geral::where('mes', 'LIKE', '%' . $mes . '%')->where('ano', 'LIKE', '%' . date('Y') . '%')->get();
        return view('dashboard', compact('geral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Geral  $geral
     * @return \Illuminate\Http\Response
     */
    public function edit(Geral $geral)
    {
        return view('geral.edit', compact('geral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Geral  $geral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Geral $geral)
    {
        Request()->validate([
            'valBen' => 'required',
            'valFam' => 'required',
            'valVol' => 'required',
            'valFonA' => 'required',
            'valParS' => 'required',
            'valAssP' => 'required',
            'mes' => 'required',
            'ano' => 'required',
        ]);

        $geral->numBeneficiarios = request('valBen'); //vai buscar ao form
        $geral->numFamilias = request('valFam');
        $geral->numVoluntarios = request('valVol');
        $geral->numFontesAlimentos = request('valFonA');
        $geral->numParceirosSociais = request('valParS');
        $geral->numAssociacoesParceiras = request('valAssP');
        $geral->mes = request('mes');
        $geral->ano = request('ano');

        /*$rotas->user_id = Auth::id(); */
        $geral->save();
        return redirect('/dashboard')->with('message', 'Dados inserido com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Geral  $geral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Geral $geral)
    {
        $geral->delete();
        return redirect('/geral')->with('message', 'Dado eliminado com sucesso!');
    }
}
