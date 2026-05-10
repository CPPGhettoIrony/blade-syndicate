<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarberiaController extends Controller
{
    public function index()
    {
        $barberias = \App\Models\Barberia::all();

        return view('barberias.index', compact('barberias'));
    }

    public function create()
    {
        return view('barberias.create');
    }

    public function edit($id)
    {
        $barberia = \App\Models\Barberia::findOrFail($id);

        return view('barberias.edit', compact('barberia'));
    }

    public function update(Request $request, $id)
    {
        $barberia = \App\Models\Barberia::findOrFail($id);

        $barberia->update([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'direccion' => $request->direccion,
            'codigo_postal' => $request->codigo_postal,
            'telefono' => $request->telefono,
            'horario_apertura' => $request->horario_apertura,
            'horario_cierre' => $request->horario_cierre,
        ]);

        return redirect('/barberias');
    }

    public function destroy($id)
    {
        $barberia = \App\Models\Barberia::findOrFail($id);

        $barberia->delete();

        return redirect('/barberias');
    }

    public function store(Request $request)
    {
        \App\Models\Barberia::create([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'direccion' => $request->direccion,
            'codigo_postal' => $request->codigo_postal,
            'telefono' => $request->telefono,
            'horario_apertura' => $request->horario_apertura,
            'horario_cierre' => $request->horario_cierre,
        ]);

        return redirect('/barberias');
    }

}
