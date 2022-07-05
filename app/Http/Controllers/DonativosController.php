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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            // 'motorista' => 'required',
            // 'carrinhas' => 'required',
            // 'numRota' => 'required',
            // 'kmPartida' => 'required',
            // 'kmChegada' => 'required',
            // 'horaPartida' => 'required',
            // 'horaChegada' => 'required',
            // 'data' => 'required',
            // 'observacoes' => 'required',

        ]);

        // $donativos = new Donativos();
        // $donativos->motorista = request('motorista'); //vai buscar ao form
        // $donativos->carrinhas_id = request('carrinhas');
        // $donativos->numRota = request('numRota');
        // $donativos->kmPartida = request('kmPartida');
        // $donativos->kmChegada = request('kmChegada');
        // $donativos->HoraPartida = request('horaPartida');
        // $donativos->horaChegada = request('horaChegada');
        // $donativos->data = request('data');
        // $donativos->observacoes = request('observacoes');

        // /*$rotas->user_id = Auth::id(); */
        // $donativos->save();
        // return redirect('/donativos')->with('message', 'Donativo inserido com sucesso');
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
