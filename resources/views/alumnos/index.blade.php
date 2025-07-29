@extends('layouts.app')

@section('content')
<style>
    /* Comentamos o eliminamos estas reglas para quitar los contenedores */
    /*
    .alumnos-wrapper {
        background-color: #ffffff;
        padding: 50px 30px;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        max-width: 1100px;
        margin: 50px auto;
    }
    */

    .alumnos-wrapper {
        max-width: 1100px;
        margin: 50px auto;
        /* sin fondo, padding, borde o sombra */
    }

    .alumnos-wrapper h1 {
        color: #0d1b2a;
        font-size: 2.5em;
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
    }

    .table {
        width: 100%;
        font-size: 1.1em;
        text-align: center;
        border-collapse: collapse;
    }

    .table th {
        background-color: #060049;
        color: white;
        padding: 15px;
    }

    .table td {
        vertical-align: middle;
        color: #333;
        padding: 15px;
    }

    .btn {
        font-size: 1em;
        padding: 8px 12px;
        border-radius: 6px;
    }

    .btn-primary {
        background-color: #0d1b2a;
        border-color: #0d1b2a;
        color: #fff;
    }

    .btn i {
        margin-right: 5px;
    }

    .btn-info {
        background-color: #1976d2;
        border-color: #1976d2;
        color: white;
    }

    .btn-warning {
        background-color: #ffa000;
        border-color: #ffa000;
        color: white;
    }

    .btn-danger {
        background-color: #c62828;
        border-color: #c62828;
        color: white;
    }

    .alert-success {
        font-size: 1.1em;
        text-align: center;
        margin-bottom: 20px;
    }

    .actions .btn {
        margin: 0 3px;
    }

    .add-btn {
        font-size: 1.1em;
        background-color: #060049;
        color: white !important;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 25px;
        transition: background-color 0.3s ease;
    }

    .add-btn:hover {
        background-color: #12345a;
    }

    /* Nuevo botón regresar */
    .btn-back {
        background-color: #555;
        color: white !important;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 25px;
        margin-right: 15px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #333;
    }
</style>

<div class="alumnos-wrapper">
    <h1>Listado de Alumnos</h1>

    <a href="{{ route('dashboard') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Regresar al Dashboard</a>
    <a href="{{ route('alumnos.create') }}" class="add-btn"><i class="fas fa-user-plus"></i> Agregar Nuevo Alumno</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->telefono ?? 'No especificado' }}</td>
                    <td class="actions">
                        <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-sm btn-info" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-sm btn-warning" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Eliminar alumno?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay alumnos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
