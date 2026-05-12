<?php

namespace App\Http\Controllers;

class IndexController extends Controller {
    public function index() {
        $barberias = \App\Models\Barberia::all();
        return view('final.index', compact('barberias'));
    }
}