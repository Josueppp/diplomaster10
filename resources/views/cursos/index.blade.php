@extends('layouts.app')

@section('title', 'Listado de Cursos')

@section('content')
<style>
  .cursos-wrapper {
    max-width: 1100px;
    margin: 50px auto;
  }

  .cursos-wrapper h1 {
    color: #0d1b2a;
    font-size: 2.5em;
    font-weight: bold;
    margin-bottom: 30px;
    text-align: center;
  }

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

  .btn-create {
    background-color: #060049;
    color: white;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 25px;
    transition: background-color 0.3s ease;
  }

  .btn-create:hover {
    background-color: #12345a;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 1.1em;
    text-align: center;
  }

  thead tr {
    background-color: #060049;
    color: white;
  }

  th, td {
    border: 1px solid #ccc;
    padding: 15px;
    vertical-align: middle;
  }

  tbody tr:hover {
    background-color: #f1f5fb;
  }

  .actions .btn {
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 6px;
    transition: background-color 0.3s ease;
    text-decoration: none;
    display: inline-block;
    margin: 0 3px;
  }

  .btn-view {
    background-color: #1976d2;
    color: white;
  }

  .btn-view:hover {
    background-color: #145ea8;
  }

  .btn-edit {
    background-color: #ffa000;
    color: white;
  }

  .btn-edit:hover {
    background-color: #cc8400;
  }

  .btn-delete {
    background-color: #c62828;
    color: white;
    border: none;
  }

  .btn-delete:hover {
    background-color: #8e0000;
  }

  .alert-success {
    font-size: 1.1em;
    text-align: center;
    margin-bottom: 20px;
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 10px 15px;
    border-radius: 6px;
  }
</style>

<div class="cursos-wrapper">
  <h1>Cursos</h1>

  <a href="{{ route('dashboard') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Regresar al Dashboard</a>
  <a href="{{ route('cursos.create') }}" class="btn-create"><i class="fas fa-plus-circle"></i> Crear Nuevo Curso</a>

  @if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
  @endif

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cursos as $curso)
      <tr>
        <td>{{ $curso->id }}</td>
        <td>{{ $curso->nombre }}</td>
        <td>{{ $curso->descripcion }}</td>
        <td>{{ $curso->estado }}</td>
        <td>{{ $curso->tipo }}</td>
        <td class="actions">
          <a href="{{ route('cursos.show', $curso) }}" class="btn btn-sm btn-view" title="Ver">
            <i class="fas fa-eye"></i>
          </a>
          <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-sm btn-edit" title="Editar">
            <i class="fas fa-edit"></i>
          </a>
          <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar curso?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-delete" title="Eliminar">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
