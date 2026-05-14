<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarberiaController extends Controller
{
    public function index()
    {
        $barberias = \App\Models\Barberia::all();

        return view('final.barberias.index', compact('barberias'));
    }

    public function create()
    {
        return view('final.barberias.create');
    }

    public function edit($id)
    {
        $barberia = \App\Models\Barberia::findOrFail($id);

        return view('final.barberias.edit', compact('barberia'));
    }

    public function update(Request $request, $id)
    {
        $barberia = \App\Models\Barberia::findOrFail($id);

        $nombreImagen = $barberia->imagen;

        if($request->hasFile('imagen')){

            $archivo = $request->file('imagen');

            $nombreImagen = time() . '.' . $archivo->getClientOriginalExtension();

            $archivo->move(public_path('img'), $nombreImagen);
        }

        $barberia->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ciudad' => $request->ciudad,
            'direccion' => $request->direccion,
            'codigo_postal' => $request->codigo_postal,
            'telefono' => $request->telefono,
            'horario_apertura' => $request->horario_apertura,
            'horario_cierre' => $request->horario_cierre,
            'imagen' => $nombreImagen,
        ]);

        return redirect('admin/barberias');
    }

    public function destroy($id)
    {
        $barberia = \App\Models\Barberia::findOrFail($id);

        $barberia->delete();

        return redirect('admin/barberias');
    }

    public function store(Request $request)
    {
        $nombreImagen = 'default.jpg';

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreImagen = time() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('img'), $nombreImagen);
        }

        \App\Models\Barberia::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ciudad' => $request->ciudad,
            'direccion' => $request->direccion,
            'codigo_postal' => $request->codigo_postal,
            'telefono' => $request->telefono,
            'horario_apertura' => $request->horario_apertura,
            'horario_cierre' => $request->horario_cierre,
            'imagen' => $nombreImagen,
        ]);

        return redirect('admin/barberias');
    }
}