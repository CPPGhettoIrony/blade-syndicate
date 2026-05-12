<?php

namespace App\Http\Controllers;

use \App\Models\Barberia;
use \Illuminate\Support\Facades\Auth;

class ListaController extends Controller {
    public function index() {
        $barberias = Barberia::all();
        $puede_reservar = Auth::check() && Auth::user()->rol == 'cliente';
        return view('final.barberias', compact('barberias', 'puede_reservar'));
    }
}