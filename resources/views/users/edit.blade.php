@extends('layouts.app')

@section('contenido')

<h1>Editar Usuario</h1>

<form method="POST" action="{{ route('users.update', $user->id) }}">
@csrf
@method('PUT')

<input name="name" value="{{ $user->name }}"><br>
<input name="email" value="{{ $user->email }}"><br>

<select name="role">
    <option value="alumno" {{ $user->role=='alumno'?'selected':'' }}>Alumno</option>
    <option value="profesor" {{ $user->role=='profesor'?'selected':'' }}>Profesor</option>
</select>

<button>Actualizar</button>
</form>

@endsection