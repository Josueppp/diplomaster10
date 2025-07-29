<?php

namespace App\Http\Controllers;

use App\Models\AlumnoCurso;
use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlumnoCursoController extends Controller
{
    // Mostrar todas las inscripciones
    public function index()
    {
        $alumnoCursos = AlumnoCurso::with(['alumno', 'curso'])->get();
        return view('alumnos_cursos.index', compact('alumnoCursos'));  // carpeta con guion bajo
    }

    // Mostrar formulario para crear nueva inscripción
    public function create()
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        return view('alumnos_cursos.create', compact('alumnos', 'cursos')); // carpeta con guion bajo
    }

    // Guardar nueva inscripción
    public function store(Request $request)
{
    // Validar datos recibidos
    $request->validate([
        'alumno_id' => 'required|exists:alumnos,id',
        'curso_id' => 'required|exists:cursos,id',
        // Cambia el 'estado' para que coincida con tu migración
        'estado' => 'required|in:cursando,aprobado,reprobado',
    ]);

    // Verificar que no exista la inscripción ya
    $existe = AlumnoCurso::where('alumno_id', $request->alumno_id)
        ->where('curso_id', $request->curso_id)
        ->first();

    if ($existe) {
        return redirect()->back()->withErrors(['msg' => 'El alumno ya está inscrito en este curso']);
    }

    // Guardar nuevo registro en la tabla alumno_cursos
    AlumnoCurso::create([
        'alumno_id' => $request->alumno_id,
        'curso_id' => $request->curso_id,
        'estado' => $request->estado,
    ]);

    return redirect()->route('alumno-curso.index')->with('success', 'Inscripción creada correctamente');
}

    // Mostrar detalle de inscripción
    public function show(AlumnoCurso $alumnoCurso)
    {
        $alumnoCurso->load(['alumno', 'curso', 'diploma']);
        return view('alumnos_cursos.show', compact('alumnoCurso'));
    }

    // Mostrar formulario para editar inscripción
    public function edit(AlumnoCurso $alumnoCurso)
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        return view('alumnos_cursos.edit', compact('alumnoCurso', 'alumnos', 'cursos'));
    }

    // Actualizar inscripción
    public function update(Request $request, AlumnoCurso $alumnoCurso)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'curso_id' => 'required|exists:cursos,id',
            'estado' => 'required|in:inscrito,finalizado,abandonado',
        ]);

        $alumnoCurso->update([
            'alumno_id' => $request->alumno_id,
            'curso_id' => $request->curso_id,
            'estado' => $request->estado,
        ]);

        return redirect()->route('alumno-curso.index')->with('success', 'Inscripción actualizada correctamente');
    }

    // Eliminar inscripción
    public function destroy(AlumnoCurso $alumnoCurso)
    {
        $alumnoCurso->delete();
        return redirect()->route('alumno-curso.index')->with('success', 'Inscripción eliminada correctamente');
    }
}
