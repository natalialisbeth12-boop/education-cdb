@extends('layouts.app')

@section('contenido')

<div class="page-wrap">
    <div class="form-card">

        <div class="form-header">
            <h1>Crear Usuario</h1>
            <a href="{{ route('users.index') }}" class="btn-volver">← Volver</a>
        </div>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="campo">
                <label>Nombre</label>
                <input type="text" name="name" placeholder="Nombre">
            </div>

            <div class="campo">
                <label>Correo</label>
                <input type="email" name="email" placeholder="Email">
            </div>

            <div class="campo">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Password">
            </div>

            <div class="campo">
                <label>Rol</label>
                <select name="role">
                    <option value="alumno">Alumno</option>
                    <option value="profesor">Profesor</option>
                </select>
            </div>

            <button type="submit" class="btn-guardar">Guardar</button>
        </form>

    </div>
</div>

@endsection