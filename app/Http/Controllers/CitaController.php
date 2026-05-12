<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Barberia;
use App\Models\Servicio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// --- FUNCIONES DE APOYO ---

function validar_permiso_cita($cita) {
    $user = Auth::user();
    
    // El admin_general puede todo, así que saltamos la validación
    if($user->rol == 'admin_general') return;

    // Validar según el rol
    if($user->rol == 'admin_local' && $cita->id_barberia != $user->id_barberia) abort(403);
    if($user->rol == 'barbero' && $cita->id_barbero != $user->id) abort(403);
    if($user->rol == 'cliente' && $cita->id_cliente != $user->id) abort(403);
}

function obtener_campos() {
    $ret = [];
    $user = Auth::user();

    if($user->rol == 'admin_local')
        $ret['id_barberia'] = $user->id_barberia;

    if($user->rol == 'barbero') {
        $ret['id_barbero'] = $user->id;
        $ret['id_barberia'] = $user->id_barberia;
    }

    if($user->rol == 'cliente')
        $ret['id_cliente'] = $user->id;

    return $ret;
}

function descartar_campos() {
    $ret = ['id_servicio', 'fecha', 'hora_inicio', 'estado'];
    $user = Auth::user();

    if($user->rol == 'admin_general')
        $ret = array_merge($ret, ['id_cliente', 'id_barberia', 'id_barbero']);
    if($user->rol == 'admin_local')
        $ret = array_merge($ret, ['id_cliente', 'id_barbero']);
    if($user->rol == 'barbero')
        $ret = array_merge($ret, ['id_cliente']);
    if($user->rol == 'cliente')
        $ret = array_merge($ret, ['id_barberia', 'id_barbero']);

    return $ret;
}

function filtrar_barberos($id_barberia) {
    if(Auth::user()->rol == 'admin_general')
        return User::where('rol', 'barbero')->get();

    return User::where('id_barberia', $id_barberia)
                ->where('rol', 'barbero')
                ->get();
}

function filtrar_citas() {
    $user = Auth::user();
    if($user->rol == 'admin_general') return Cita::all();
    if($user->rol == 'admin_local') return Cita::where('id_barberia', $user->id_barberia)->get();
    if($user->rol == 'barbero') return Cita::where('id_barbero', $user->id)->get();
    if($user->rol == 'cliente') return Cita::where('id_cliente', $user->id)->get();
    return collect();
}

class CitaController extends Controller
{
    public function index() {
        $citas = filtrar_citas();
        $campos = descartar_campos();
        $usuario = Auth::user()->nombre . ' ' . Auth::user()->apellidos;
        return view('final.citas.index', compact('citas', 'campos', 'usuario'));
    }

    public function create($id)
    {
        $clientes = User::where('rol', 'cliente')->get();
        $barberos = filtrar_barberos($id);
        $barberias = Barberia::all();
        $servicios = Servicio::all();
        $campos = obtener_campos();

        if(!is_null($id)) $campos['id_barberia'] = $id;

        return view('final.citas.create', compact('clientes', 'barberos', 'barberias', 'servicios', 'campos'));
    }

    public function store(Request $request)
    {
        $servicio = Servicio::findOrFail($request->id_servicio);
        $horaFin = Carbon::parse($request->hora_inicio)->addMinutes($servicio->duracion_min)->format('H:i:s');

        Cita::create([
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
        $cita = Cita::findOrFail($id);
        validar_permiso_cita($cita); // SEGURIDAD IDOR

        $clientes = User::where('rol', 'cliente')->get();
        $barberos = filtrar_barberos($cita->id_barberia);
        $barberias = Barberia::all();
        $servicios = Servicio::all();
        $estados = ['pendiente', 'confirmada', 'completada'];
        $campos = obtener_campos();

        if(Auth::user()->rol == 'cliente') $campos['estado'] = $cita->estado;

        return view('final.citas.edit', compact('cita', 'clientes', 'barberos', 'barberias', 'servicios', 'campos', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        validar_permiso_cita($cita); // SEGURIDAD IDOR

        $servicio = Servicio::findOrFail($request->id_servicio);
        $horaFin = Carbon::parse($request->hora_inicio)->addMinutes($servicio->duracion_min)->format('H:i:s');

        $cita->update([
            'id_cliente' => $request->id_cliente,
            'id_barbero' => $request->id_barbero,
            'id_barberia' => $request->id_barberia,
            'id_servicio' => $request->id_servicio,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $horaFin,
            'estado' => $request->estado ?? $cita->estado,
        ]);

        return redirect('/citas');
    }

    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        validar_permiso_cita($cita); // SEGURIDAD IDOR

        $cita->delete();
        return redirect('/citas');
    }
}