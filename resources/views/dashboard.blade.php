@extends('layouts.app')

@section('title', 'Panel de administración')

@section('content')

<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #0b1e40;
    margin: 0;
    color: #fff;
  }

  .admin-panel {
    max-width: 1100px;
    margin: 40px auto;
    padding: 30px 20px;
    background-color: #12294b;
    border-radius: 16px;
    box-shadow: 0 6px 18px #ffffff66;
    text-align: center;
  }

  .admin-panel h2 {
    font-size: 2.4em;
    margin-bottom: 10px;
    color: #ffffff; /* blanco puro */
  }

  .admin-panel p {
    font-size: 1.15em;
    color: #d0d9e8;
    margin-bottom: 40px;
  }

  .panel-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 28px;
  }

  .panel-buttons a {
    background-color: #0d3b75;
    color: white;
    padding: 20px 28px;
    border-radius: 14px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    text-decoration: none;
    width: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.25s ease, background-color 0.25s ease;
    font-weight: 600;
    font-size: 1.15em;
  }
  .panel-buttons a:hover {
    background-color: #144a9c;
    transform: scale(1.05);
  }

  .icon {
    width: 48px;
    height: 48px;
    margin-bottom: 12px;
    fill: white;
  }
  .btn-inscripciones .icon {
    fill: white;
  }

  @media (max-width: 650px) {
    .panel-buttons {
      flex-direction: column;
      gap: 20px;
    }
    .panel-buttons a {
      width: 100%;
      max-width: 320px;
      margin: 0 auto;
    }
  }
</style>

<div class="admin-panel">
  <h2>Panel de administración</h2>
  <p>Selecciona una opción para comenzar a gestionar:</p>

  <div class="panel-buttons">

    <a href="{{ route('alumnos.index') }}" class="btn-alumnos" title="Gestionar Alumnos">
      <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
      </svg>
      Gestionar Alumnos
    </a>

    <a href="{{ route('cursos.index') }}" class="btn-cursos" title="Gestionar Cursos">
      <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M18 2H6c-1.1 0-2 .9-2 2v16l8-3 8 3V4c0-1.1-.9-2-2-2z"/>
      </svg>
      Gestionar Cursos
    </a>

    <a href="{{ route('alumno-curso.index') }}" class="btn-inscripciones" title="Inscripciones">
      <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M14 2H6c-1.1 0-2 .9-2 2v16l8-3 8 3V8l-6-6zM13 10h-2v2H9v-2H7v-2h2V6h2v2h2v2z"/>
      </svg>
      Inscripciones
    </a>

    <a href="{{ route('diplomas.index') }}" class="btn-diplomas" title="Diplomas">
      <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 2a7 7 0 0 0-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 0 0-7-7zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z"/>
      </svg>
      Diplomas
    </a>

  </div>
</div>

@endsection
