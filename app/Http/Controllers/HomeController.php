<?php

namespace App\Http\Controllers;

use App\Models\Geral;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use mysqli;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $geral = Geral::where('mes', 'LIKE', '%' . (date('m') - 1) . '%')->where('ano', 'LIKE', '%' . date('Y') . '%')->get();
        return view('dashboard', compact('geral'));
    }

    public function search()
    {
        $mes = request('mes');
        $ano = request('ano');

        if ($ano == '') {
            $ano = date('Y') - 1;
        }

        $geral = Geral::where('mes', 'LIKE', '%' . $mes . '%')->where('ano', 'LIKE', '%' . date('Y') . '%')->get();
        $geralG = Geral::where('ano', 'LIKE', '%' . $ano . '%')->get();
        return view('home', compact('geral', 'geralG'));
    }
}
