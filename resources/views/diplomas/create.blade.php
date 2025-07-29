@extends('layouts.app')

@section('title', 'Crear Diploma')

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
        margin-bottom: 12px;
        font-weight: 600;
        color: #1e40af;
        font-size: 1rem;
    }

    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 10px 14px;
        border: 2px solid #3b82f6; /* azul claro */
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        color: #1e293b;
        background-color: #eff6ff;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    select:focus {
        border-color: #2563eb; /* azul medio */
        background-color: white;
        outline: none;
        box-shadow: 0 0 6px #2563ebaa;
        color: #1e40af;
    }

    .error-message {
        color: #b91c1c;
        font-size: 0.875rem;
        margin-top: 4px;
        display: block;
    }

    .btn-save {
        background-color: #1e40af; /* azul fuerte */
        border: none;
        color: white;
        padding: 12px 25px;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.5);
        transition: background-color 0.3s ease;
    }

    .btn-save:hover {
        background-color: #1e3a94;
        box-shadow: 0 6px 16px rgba(30, 58, 148, 0.7);
    }

    .btn-cancel {
        margin-left: 16px;
        padding: 12px 25px;
        border: 2px solid #1e40af;
        border-radius: 8px;
        background-color: transparent;
        color: #1e40af;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }

    .btn-cancel:hover {
        background-color: #1e40af;
        color: white;
        box-shadow: 0 6px 16px rgba(30, 58, 148, 0.7);
        text-decoration: none;
    }
</style>

<div class="container mx-auto p-4 max-w-md">
    <h1>Crear Nuevo Diploma</h1>

    <form action="{{ route('diplomas.store') }}" method="POST">
        @csrf

        <label>
            AlumnoCurso ID:
            <select name="alumno_curso_id" required>
                <option value="">Selecciona una inscripción</option>
                @foreach($alumnoCursos as $inscripcion)
                    <option value="{{ $inscripcion->id }}">
                        Alumno: {{ $inscripcion->alumno->nombre }} - Curso: {{ $inscripcion->curso->nombre }}
                    </option>
                @endforeach
            </select>
            @error('alumno_curso_id') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label for="codigo_unico">
            Código Único:
            <input type="text" name="codigo_unico" id="codigo_unico" value="{{ old('codigo_unico') }}" required>
            @error('codigo_unico') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <label>
            Fecha de Emisión:
            <input type="date" name="fecha_emision" value="{{ old('fecha_emision') }}" required>
            @error('fecha_emision') <span class="error-message">{{ $message }}</span> @enderror
        </label>

        <div style="margin-top: 20px; display: flex; align-items: center;">
            <button type="submit" class="btn-save">Guardar Diploma</button>
            <a href="{{ route('diplomas.index') }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>
@endsection
