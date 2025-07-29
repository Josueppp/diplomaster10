<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diploma extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_curso_id', 'codigo_unico', 'fecha_emision'];
protected $casts = [
    'fecha_emision' => 'datetime',
];

    public function alumnoCurso()
    {
        return $this->belongsTo(AlumnoCurso::class);
    }
}
