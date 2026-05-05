@extends('layouts.app')

@section('contenido')

<div class="page-wrap">
    <div class="form-card">

        <div class="form-header">
            <h1>Editar Usuario</h1>
            <a href="{{ route('users.index') }}" class="btn-volver">← Volver</a>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="campo">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ $user->name }}">
            </div>

            <div class="campo">
                <label>Correo</label>
                <input type="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="campo">
                <label>Rol</label>
                <select name="role">
                    <option value="alumno"   {{ $user->role=='alumno'   ? 'selected' : '' }}>Alumno</option>
                    <option value="profesor" {{ $user->role=='profesor' ? 'selected' : '' }}>Profesor</option>
                </select>
            </div>

            <button type="submit" class="btn-actualizar">Actualizar</button>
        </form>

    </div>
</div>

@endsection