<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
        protected $fillable = ['nombre', 'email', 'telefono' ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'alumnos_cursos')
                    ->withPivot('estado')
                    ->withTimestamps();
    }

    // Si quieres también agregar relación a inscripciones (modelo AlumnoCurso)
    public function alumnoCursos()
    {
        return $this->hasMany(AlumnoCurso::class);
    }
}
