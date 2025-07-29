@extends('layouts.app')

@section('title', 'Editar Curso')

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

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #1e40af;
        font-size: 1rem;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 10px 14px;
        border: 2px solid #3b82f6;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        color: #1e293b;
        background-color: #f9fafb;
        box-sizing: border-box;
        resize: vertical;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
        border-color: #2563eb;
        background-color: white;
        outline: none;
        box-shadow: 0 0 6px #2563ebaa;
        color: #111827;
    }

    .error-message {
        color: #b91c1c;
        font-size: 0.9rem;
        margin-top: 4px;
        display: block;
    }

    button, a.cancel-btn {
        padding: 12px 25px;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.5);
        border: none;
        display: inline-block;
        text-align: center;
        text-decoration: none;
    }

    button {
        background-color: #1e40af;
        color: white;
        border: none;
        margin-top: 10px;
    }

    button:hover {
        background-color: #1e3a94;
        box-shadow: 0 6px 16px rgba(30, 58, 148, 0.7);
    }

    a.cancel-btn {
        background-color: transparent;
        border: 2px solid #1e40af;
        color: #1e40af;
        margin-left: 15px;
    }

    a.cancel-btn:hover {
        background-color: #1e40af;
        color: white;
        box-shadow: 0 6px 16px rgba(30, 58, 148, 0.7);
    }

    .mb-4 {
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <h1>Editar Curso</h1>

    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            Nombre:
            <input type="text" name="nombre" value="{{ old('nombre', $curso->nombre) }}" required>
            @error('nombre') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label>
            Descripción:
            <textarea name="descripcion" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
            @error('descripcion') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label>
            Estado:
            <select name="estado" required>
                <option value="activo" {{ old('estado', $curso->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $curso->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label>
            Tipo:
            <select name="tipo" required>
                <option value="">-- Selecciona un tipo --</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo }}" {{ $curso->tipo === $tipo ? 'selected' : '' }}>
                        {{ ucfirst($tipo) }}
                    </option>
                @endforeach
            </select>
        </label>

        <label>
            Competencias:
            <textarea name="competencias">{{ old('competencias', $curso->competencias) }}</textarea>
        </label>

        <label>
            Profesor ID:
            <input type="number" name="profesor_id" value="{{ old('profesor_id', $curso->profesor_id) }}" required>
            @error('profesor_id') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label>
            Horas Trabajadas:
            <input type="number" name="horas_trabajadas" value="{{ old('horas_trabajadas', $curso->horas_trabajadas) }}" required>
            @error('horas_trabajadas') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <button type="submit">Actualizar Curso</button>
        <a href="{{ route('cursos.index') }}" class="cancel-btn">Cancelar</a>
    </form>
</div>
@endsection
