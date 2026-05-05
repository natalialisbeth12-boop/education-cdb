<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function mostrarRegistro()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function procesarRegistro(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:profesor,alumno',
        ], [
            'name.required'      => 'El nombre es obligatorio.',
            'name.max'           => 'El nombre no puede superar 100 caracteres.',
            'email.required'     => 'El correo es obligatorio.',
            'email.email'        => 'Ingresa un correo válido.',
            'email.unique'       => 'Ese correo ya está registrado.',
            'password.required'  => 'La contraseña es obligatoria.',
            'password.min'       => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'role.required'      => 'Selecciona un rol.',
            'role.in'            => 'El rol seleccionado no es válido.',
        ]);

        $usuario = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
