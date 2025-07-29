<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
      protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'tipo',
        'competencias',
        'profesor_id',
        'horas_trabajadas',
    ];
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumnos_cursos')
                    ->withPivot('estado')
                    ->withTimestamps();
    }

    public function alumnoCursos()
    {
        return $this->hasMany(AlumnoCurso::class);
    }
}
