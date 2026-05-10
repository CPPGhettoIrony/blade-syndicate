<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barberia;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('barberia')->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $barberias = Barberia::all();

        return view('usuarios.create', compact('barberias'));
    }

    public function store(Request $request)
    {
        User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'id_barberia' => $request->id_barberia ?: null,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/usuarios');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $barberias = Barberia::all();

        return view('usuarios.edit', compact('usuario', 'barberias'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $datos = [
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'id_barberia' => $request->id_barberia ?: null,
        ];

        if ($request->password) {
            $datos['password'] = Hash::make($request->password);
        }

        $usuario->update($datos);

        return redirect('/usuarios');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/usuarios');
    }
}