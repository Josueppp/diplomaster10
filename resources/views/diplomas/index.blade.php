@extends('layouts.app')

@section('title', 'Listado de Diplomas')

@section('content')
<style>
  /* Contenedor sin fondo, padding ni sombra */
  /*
  .diplomas-wrapper {
    max-width: 1100px;
    margin: 50px auto;
    background-color: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
  }
  */
  .diplomas-wrapper {
    max-width: 1100px;
    margin: 50px auto;
    /* sin fondo ni padding */
  }

  .diplomas-wrapper h1 {
    color: #0d1b2a;
    font-size: 2.5em;
    font-weight: bold;
    margin-bottom: 30px;
    text-align: center;
  }

  /* Botón regresar al dashboard */
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

  a.action-link {
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 6px;
    transition: background-color 0.3s ease;
    text-decoration: none;
    margin-right: 6px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  a.action-link.view {
    color: white;
    background-color: #1976d2;
  }
  a.action-link.view:hover {
    background-color: #145ea8;
  }

  a.action-link.edit {
    color: white;
    background-color: #ffa000;
  }
  a.action-link.edit:hover {
    background-color: #cc8400;
  }

  a.action-link.pdf {
    color: white;
    background-color: #d32f2f;
  }
  a.action-link.pdf:hover {
    background-color: #9a1c1c;
  }

  button.action-link.pdf {
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    border: none;
    background-color: #d32f2f;
    color: white;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: background-color 0.3s ease;
  }
  button.action-link.pdf:hover {
    background-color: #9a1c1c;
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

  /* Icon style for PDF */
  .fas.fa-file-pdf,
  .fas.fa-trash-alt,
  .fas.fa-edit,
  .fas.fa-eye {
    font-size: 1em;
  }
</style>

<div class="diplomas-wrapper">
  <h1>Diplomas</h1>

  <a href="{{ route('dashboard') }}" class="btn-back"><i class="fas fa-arrow-left"></i> Regresar al Dashboard</a>
  <a href="{{ route('diplomas.create') }}" class="btn-create">Crear Nuevo Diploma</a>

  @if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
  @endif

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>AlumnoCurso ID</th>
        <th>Código Único</th>
        <th>Fecha Emisión</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($diplomas as $diploma)
      <tr>
        <td>{{ $diploma->id }}</td>
        <td>{{ $diploma->alumno_curso_id }}</td>
        <td>{{ $diploma->codigo_unico }}</td>
        <td>{{ $diploma->fecha_emision->format('d/m/Y') }}</td>
        <td>
          <a href="{{ route('diplomas.show', $diploma) }}" class="action-link view" title="Ver">
            <i class="fas fa-eye"></i>
          </a>
          <a href="{{ route('diplomas.edit', $diploma) }}" class="action-link edit" title="Editar">
            <i class="fas fa-edit"></i>
          </a>
          <a href="{{ route('diplomas.enviar', $diploma->id) }}" target="_blank" class="action-link pdf" title="Descargar PDF">
            <i class="fas fa-file-pdf"></i>
          </a>
          <form action="{{ route('diplomas.destroy', $diploma) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar diploma?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-link pdf" title="Eliminar">
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
