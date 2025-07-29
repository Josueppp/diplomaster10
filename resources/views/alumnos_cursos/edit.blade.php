@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f4f7fc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #1a1a1a;
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px 40px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #1e40af; /* azul fuerte */
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
        font-size: 2rem;
    }

    .alert-danger {
        background-color: #fee2e2;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 25px;
        color: #b91c1c;
        border: 1px solid #fca5a5;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }

    label.form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #1e40af;
        font-size: 1rem;
    }

    select.form-control {
        width: 100%;
        padding: 10px 14px;
        border: 2px solid #3b82f6;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        color: #1e293b;
        background-color: #f9fafb;
        box-sizing: border-box;
    }

    select.form-control:focus {
        border-color: #2563eb;
        background-color: white;
        outline: none;
        box-shadow: 0 0 6px #2563ebaa;
        color: #111827;
    }

    .btn-primary, .btn-secondary, .btn-success {
        padding: 12px 25px;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.5);
        width: auto;
        text-align: center;
        border: none;
        margin-right: 15px;
        display: inline-block;
    }

    .btn-success {
        background-color: #16a34a; /* verde */
        color: white;
    }

    .btn-success:hover {
        background-color: #15803d;
        box-shadow: 0 6px 16px rgba(21, 128, 61, 0.7);
    }

    .btn-secondary {
        background-color: transparent;
        border: 2px solid #1e40af;
        color: #1e40af;
        font-weight: 600;
        text-decoration: none;
        box-shadow: none;
        padding: 10px 25px;
    }

    .btn-secondary:hover {
        background-color: #1e40af;
        color: white;
        box-shadow: 0 6px 16px rgba(30, 58, 148, 0.7);
    }

    .mb-3 {
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <h1>Editar Inscripción</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumno-curso.update', $alumnoCurso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-control" disabled>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}" {{ $alumno->id == $alumnoCurso->alumno_id ? 'selected' : '' }}>
                        {{ $alumno->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" id="curso_id" class="form-control" disabled>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}" {{ $curso->id == $alumnoCurso->curso_id ? 'selected' : '' }}>
                        {{ $curso->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="inscrito" {{ $alumnoCurso->estado == 'inscrito' ? 'selected' : '' }}>Inscrito</option>
                <option value="finalizado" {{ $alumnoCurso->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                <option value="abandonado" {{ $alumnoCurso->estado == 'abandonado' ? 'selected' : '' }}>Abandonado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('alumno-curso.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
