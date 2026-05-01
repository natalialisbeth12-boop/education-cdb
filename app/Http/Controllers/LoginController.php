<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class LoginController extends Controller
{
    // Muestra el formulario de login
    public function mostrarLogin()
    {
        // Si ya está autenticado, redirige al dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    // Procesa el intento de login
    public function procesarLogin(Request $request)
    {
        // Validación básica
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'El correo es obligatorio.',
            'email.email'       => 'Ingresa un correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Busca el usuario en la BD
        $usuario = User::where('email', $request->email)->first();

        // Si no existe el usuario
        if (!$usuario) {
            return back()->withErrors(['email' => 'No existe una cuenta con ese correo.']);
        }

        // Verifica si la cuenta está bloqueada
        if ($usuario->estaBloqueado()) {
            $segundos = Carbon::now()->diffInSeconds($usuario->bloqueado_hasta);
            return back()->withErrors([
                'email' => "Cuenta bloqueada. Intenta de nuevo en {$segundos} segundos."
            ]);
        }

        // Verifica la contraseña
        if (!Hash::check($request->password, $usuario->password)) {
            $usuario->registrarIntentoFallido();

            $restantes = 3 - $usuario->fresh()->intentos_fallidos;
            if ($restantes <= 0) {
                return back()->withErrors([
                    'email' => 'Demasiados intentos. Cuenta bloqueada por 1 minuto.'
                ]);
            }

            return back()->withErrors([
                'password' => "Contraseña incorrecta. Te quedan {$restantes} intento(s)."
            ]);
        }

        // Login exitoso
        $usuario->reiniciarIntentos();
        Auth::login($usuario, $request->boolean('recordarme'));

        $request->session()->regenerate();

        // Guardar o limpiar la cookie del email según el checkbox
        if ($request->boolean('recordarme')) {
            $cookieEmail = Cookie::make('email_recordado', $usuario->email, 60 * 24 * 30); // 30 días
        } else {
            $cookieEmail = Cookie::forget('email_recordado');
        }

        return redirect()->route('dashboard')->withCookie($cookieEmail);
    }

    // Cierra sesión
    public function cerrarSesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // No borrar la cookie del email al cerrar sesión (para que siga pre-llenado)
        return redirect()->route('login');
    }
}
