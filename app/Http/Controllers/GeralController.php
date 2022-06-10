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
        // Selecionar os dados da base de dados
        $geral = Geral::all();
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
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Geral  $geral
     * @return \Illuminate\Http\Response
     */
    public function edit(Geral $geral)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Geral  $geral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Geral $geral)
    {
        //
    }
}
