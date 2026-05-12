<?php

namespace App\Http\Controllers;

class ListaController extends Controller {
    public function index() {
        $barberias = \App\Models\Barberia::all();
        return view('final.barberias', compact('barberias'));
    }
}