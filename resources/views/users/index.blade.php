@extends('layouts.app')

@section('contenido')

{{-- Modal confirmacionn --}}
<div class="modal-overlay" id="modalEliminar">
    <div class="modal">
        <h2>Eliminar usuario</h2>
        <p>¿Estás seguro? Esta acción no se puede deshacer.</p>
        <div class="modal-botones">
            <button class="btn-cancelar" onclick="cerrarModal()">Cancelar</button>
            <button class="btn-confirmar" onclick="confirmarEliminar()">Sí, eliminar</button>
        </div>
    </div>
</div>

<div class="page-wrap">
    <div class="section-header">
        <h1>Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn-crear">+ Crear Usuario</a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="rol-badge rol-{{ $user->role }}">{{ ucfirst($user->role) }}</span>
                    </td>
                    <td>
                        <div class="acciones">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn-editar">Editar</a>
                            <form id="form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-eliminar" onclick="abrirModal({{ $user->id }})">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    let formActivo = null;

    function abrirModal(id) {
        formActivo = document.getElementById('form-' + id);
        document.getElementById('modalEliminar').classList.add('activo');
    }

    function cerrarModal() {
        formActivo = null;
        document.getElementById('modalEliminar').classList.remove('activo');
    }

    function confirmarEliminar() {
        if (formActivo) formActivo.submit();
    }
</script>

@endsection