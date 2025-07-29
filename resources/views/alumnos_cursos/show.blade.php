@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4" style="color: #003366; font-weight: bold;">
        <i class="bi bi-card-checklist"></i> Detalles de la Inscripción
    </h1>

    <div class="card shadow-sm" style="border-left: 5px solid #003366;">
        <div class="card-body">
            <h4 class="card-title" style="color: #003366;">
                Alumno: {{ $alumnoCurso->alumno->nombre }}
            </h4>
            <p class="card-text"><strong>Curso:</strong> {{ $alumnoCurso->curso->nombre }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ ucfirst($alumnoCurso->estado) }}</p>

            @if ($alumnoCurso->diploma)
                <p class="card-text">
                    <strong>Diploma:</strong> Sí (ID: {{ $alumnoCurso->diploma->id }})
                </p>
            @else
                <p class="card-text"><strong>Diploma:</strong> No disponible</p>
            @endif
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('alumno-curso.index') }}" class="btn" style="background-color: #003366; color: white;">
            ← Regresar a Inscripciones
        </a>
    </div>
</div>
@endsection
