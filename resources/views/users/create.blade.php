@extends('layouts.app')

@section('contenido')

<h1>Crear Usuario</h1>

<form method="POST" action="{{ route('users.store') }}">
@csrf

<input name="name" placeholder="Nombre"><br>
<input name="email" placeholder="Email"><br>
<input type="password" name="password" placeholder="Password"><br>

<select name="role">
    <option value="alumno">Alumno</option>
    <option value="profesor">Profesor</option>
</select>

<button>Guardar</button>
</form>

@endsection