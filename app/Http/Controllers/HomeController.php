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
        $geral = Geral::all();
        return view('dashboard', compact('geral'));
    }
}
