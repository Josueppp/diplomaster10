@extends('layouts.app')

@section('title', 'Detalle del Curso')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4" style="color: #003366; font-weight: bold;">
        <i class="bi bi-journal-bookmark"></i> Detalle del Curso
    </h1>

    <div class="card shadow-sm" style="border-left: 5px solid #003366;">
        <div class="card-body" style="color: #003366;">
            <p><strong>ID:</strong> {{ $curso->id }}</p>
            <p><strong>Nombre:</strong> {{ $curso->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
            <p><strong>Estado:</strong> {{ $curso->estado }}</p>
            <p><strong>Tipo:</strong> {{ $curso->tipo }}</p>
            <p><strong>Competencias:</strong> {{ $curso->competencias }}</p>
            <p><strong>Profesor ID:</strong> {{ $curso->profesor_id }}</p>
            <p><strong>Horas Trabajadas:</strong> {{ $curso->horas_trabajadas }}</p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('cursos.index') }}" class="btn" style="background-color: #003366; color: white;">
            ← Regresar a Cursos
        </a>
    </div>
</div>
@endsection
