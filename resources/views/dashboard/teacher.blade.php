@extends('layouts.app')

@section('titulo', 'Panel Profesor')

@section('contenido')
<div class="contenido">
    <h1>Panel del Profesor</h1>

    <div class="aviso aviso-peligro">Tienes acceso de profesor.</div>

    <table>
        <tr><td>Usuario:</td><td>{{ $usuario->name }}</td></tr>
        <tr><td>Correo:</td><td>{{ $usuario->email }}</td></tr>
        <tr><td>Rol:</td><td><span class="rol rol-profesor">Profesor</span></td></tr>
        <tr><td>Registrado:</td><td>{{ $usuario->created_at->format('d/m/Y') }}</td></tr>
    </table>
</div>
@endsection
