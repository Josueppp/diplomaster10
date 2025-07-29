@extends('layouts.app')

@section('title', 'Editar Diploma')

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

    select, input[type="text"], input[type="date"] {
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

    select:focus, input[type="text"]:focus, input[type="date"]:focus {
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
        background-color: #16a34a; /* verde */
        color: white;
        border: none;
        margin-top: 10px;
    }

    button:hover {
        background-color: #15803d;
        box-shadow: 0 6px 16px rgba(21, 128, 61, 0.7);
    }

    a.cancel-btn {
        background-color: transparent;
        border: 2px solid #6b7280; /* gris */
        color: #6b7280;
        margin-left: 15px;
        padding: 11px 23px;
        line-height: 1;
    }

    a.cancel-btn:hover {
        background-color: #6b7280;
        color: white;
        box-shadow: 0 6px 16px rgba(107, 114, 128, 0.7);
    }
</style>

<div class="container">
    <h1>Editar Diploma</h1>

    <form action="{{ route('diplomas.update', $diploma) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            AlumnoCurso ID:
            <select name="alumno_curso_id" required>
                @foreach($alumnoCursos as $inscripcion)
                    <option value="{{ $inscripcion->id }}" {{ $inscripcion->id == old('alumno_curso_id', $diploma->alumno_curso_id) ? 'selected' : '' }}>
                        Alumno: {{ $inscripcion->alumno->nombre }} - Curso: {{ $inscripcion->curso->nombre }}
                    </option>
                @endforeach
            </select>
            @error('alumno_curso_id') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label>
            Código Único:
            <input type="text" name="codigo_unico" value="{{ old('codigo_unico', $diploma->codigo_unico) }}" required>
            @error('codigo_unico') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label>
            Fecha de Emisión:
            <input type="date" name="fecha_emision" value="{{ old('fecha_emision', $diploma->fecha_emision->format('Y-m-d')) }}" required>
            @error('fecha_emision') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <button type="submit">Actualizar Diploma</button>
        <a href="{{ route('diplomas.index') }}" class="cancel-btn">Cancelar</a>
    </form>
</div>
@endsection
