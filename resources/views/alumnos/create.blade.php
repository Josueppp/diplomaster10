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

    input.form-control {
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

    input.form-control:focus {
        border-color: #2563eb;
        background-color: white;
        outline: none;
        box-shadow: 0 0 6px #2563ebaa;
        color: #111827;
    }

    .btn-primary, .btn-secondary {
        padding: 12px 25px;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.5);
        width: auto;
        text-align: center;
    }

    .btn-primary {
        background-color: #1e40af;
        border: none;
        color: white;
        margin-right: 15px;
    }

    .btn-primary:hover {
        background-color: #1e3a94;
        box-shadow: 0 6px 16px rgba(30, 58, 148, 0.7);
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

    .btn-group {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 15px;
        margin-top: 15px;
    }

    .mb-3 {
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <h1>Agregar Nuevo Alumno</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
