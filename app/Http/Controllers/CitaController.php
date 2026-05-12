<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index() {
        // Placeholder, listar TODAS las citas
        $citas = Cita::all();
        $campos = ['id_cliente', 'id_barberia', 'id_barbero', 'id_servicio', 'fecha', 'hora_inicio', 'estado'];
        return view('final.citas.index', compact('citas', 'campos'));
    }

    public function create($id = null)
    {
        $clientes = \App\Models\User::where('rol', 'cliente')->get();
        $barberos = \App\Models\User::where('rol', 'barbero')->get();
        $barberias = \App\Models\Barberia::all();
        $servicios = \App\Models\Servicio::all();

        // Ejemplos
        $campos = [];

        if(!is_null($id))
            $campos['id_barberia'] = $id;

        return view('final.citas.create', compact(
            'clientes',
            'barberos',
            'barberias',
            'servicios',
            'campos'
        ));
    }

    public function store(Request $request)
    {
        $servicio = Servicio::findOrFail($request->id_servicio);

        $horaFin = Carbon::createFromFormat('H:i', $request->hora_inicio)
            ->addMinutes($servicio->duracion_min)
            ->format('H:i:s');

        \App\Models\Cita::create([
            'id_cliente' => $request->id_cliente,
            'id_barbero' => $request->id_barbero,
            'id_barberia' => $request->id_barberia,
            'id_servicio' => $request->id_servicio,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $horaFin,
            'estado' => 'pendiente',
        ]);

        return redirect('/citas');
    }

    public function edit($id)
    {
        $cita = \App\Models\Cita::findOrFail($id);

        $clientes = \App\Models\User::where('rol', 'cliente')->get();
        $barberos = \App\Models\User::where('rol', 'barbero')->get();
        $barberias = \App\Models\Barberia::all();
        $servicios = \App\Models\Servicio::all();

        $campos = [];

        $estados = ['pendiente', 'confirmada', 'completada'];

        return view('final.citas.edit', compact(
            'cita',
            'clientes',
            'barberos',
            'barberias',
            'servicios',
            'campos',
            'estados'
        ));
    }

    public function update(Request $request, $id)
    {
        $cita = \App\Models\Cita::findOrFail($id);

        $servicio = \App\Models\Servicio::findOrFail($request->id_servicio);

        $horaFin = \Carbon\Carbon::parse($request->hora_inicio)
            ->addMinutes($servicio->duracion_min)
            ->format('H:i:s');

        $cita->update([
            'id_cliente' => $request->id_cliente,
            'id_barbero' => $request->id_barbero,
            'id_barberia' => $request->id_barberia,
            'id_servicio' => $request->id_servicio,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $horaFin,
            'estado' => $request->estado,
        ]);

        return redirect('/citas');
    }

    public function destroy($id)
    {
        $cita = \App\Models\Cita::findOrFail($id);

        $cita->delete();

        return redirect('/citas');
    }

}
