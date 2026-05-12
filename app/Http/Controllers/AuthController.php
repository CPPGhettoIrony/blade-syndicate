<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}