<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        if ($usuario->esProfesor()) {
            return view('dashboard.teacher', compact('usuario'));
        }

        return view('dashboard.student', compact('usuario'));
    }
}
