<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller {
    public function login(Request $request) {
        $credenciales = $request->only('email', 'password');

        // Intenta loguear: busca el email y compara el password (hasheado)
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->intended('barberias');
        }

        return back()->withErrors(['mensaje' => 'Usuario o contraseña incorrectos']);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function index() {
        if (Auth::check())
            return redirect('/barberias');
        return view('final.login', []);
    }


    public function registro()
    {
        return view('final.registro', []);
    }
    public function guardarRegistro(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:150',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'cliente',
            'id_barberia' => null,
        ]);

        return redirect('/login')->with('mensaje', 'Usuario registrado correctamente. Ya puedes iniciar sesión.');
    }

}