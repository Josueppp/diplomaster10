<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoCurso extends Model
{
    // Para permitir asignación masiva
    protected $fillable = ['alumno_id', 'curso_id', 'estado'];

    // Relaciones
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function diploma()
    {
        return $this->hasOne(Diploma::class);
    }
}
