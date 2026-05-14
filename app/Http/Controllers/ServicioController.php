<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();

        return view('final.servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('final.servicios.create');
    }

    public function store(Request $request)
    {
        Servicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'duracion_min' => $request->duracion_min,
        ]);

        return redirect('admin/servicios');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);

        return view('final.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $servicio->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'duracion_min' => $request->duracion_min,
        ]);

        return redirect('admin/servicios');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);

        $servicio->delete();

        return redirect('admin/servicios');
    }
}