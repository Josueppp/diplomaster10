@extends('layouts.app')

@section('title', 'Detalle del Diploma')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4" style="color: #003366; font-weight: bold;">
        <i class="fas fa-certificate"></i> Detalle del Diploma
    </h1>

    <div class="card shadow-sm" style="border-left: 5px solid #003366;">
        <div class="card-body" style="color: #003366;">
            <p><strong>ID:</strong> {{ $diploma->id }}</p>
            <p><strong>AlumnoCurso ID:</strong> {{ $diploma->alumno_curso_id }}</p>
            <p><strong>Código Único:</strong> {{ $diploma->codigo_unico }}</p>
            <p><strong>Fecha de Emisión:</strong> {{ $diploma->fecha_emision->format('d/m/Y') }}</p>
            <p><strong>Creado:</strong> {{ $diploma->created_at->format('d/m/Y') }}</p>
            <p><strong>Actualizado:</strong> {{ $diploma->updated_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('diplomas.enviar', $diploma->id) }}" target="_blank" class="btn btn-danger me-2">
            <i class="fas fa-file-download"></i> Descargar diploma PDF
        </a>
        <a href="{{ route('diplomas.show', $diploma->id) }}" class="btn btn-primary">
            <i class="fas fa-graduation-cap"></i> Ver diploma
        </a>
    </div>

   <div class="mt-4 text-center">
    <a href="{{ route('diplomas.index') }}" class="btn btn-primary">
        ← Volver a la lista
    </a>
</div>

</div>
@endsection
