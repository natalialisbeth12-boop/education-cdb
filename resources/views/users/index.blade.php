@extends('layouts.app')

@section('contenido')

<h1>Usuarios</h1>

<a href="{{ route('users.create') }}">Crear Usuario</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Rol</th>
    <th>Acciones</th>
</tr>

@foreach($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role }}</td>

    <td>
        <a href="{{ route('users.edit', $user->id) }}">Editar</a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Eliminar</button>
        </form>
    </td>
</tr>
@endforeach
</table>

@endsection