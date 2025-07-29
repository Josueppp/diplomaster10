@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4" style="color: #003366; font-weight: bold;">
        <i class="bi bi-person-circle"></i> Detalles del Alumno
    </h1>

    <div class="card shadow-sm" style="border-left: 5px solid #003366;">
        <div class="card-body">
            <h4 class="card-title" style="color: #003366;">{{ $alumno->nombre }}</h4>
            <p class="card-text"><strong>Email:</strong> {{ $alumno->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $alumno->telefono ?? 'No especificado' }}</p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('alumnos.index') }}" class="btn" style="background-color: #003366; color: white;">
            ← Regresar a la lista
        </a>
    </div>
</div>
@endsection
