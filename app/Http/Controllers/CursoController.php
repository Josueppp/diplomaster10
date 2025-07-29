<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Mostrar listado de cursos
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    // Mostrar formulario para crear nuevo curso
   public function create()
{
    $tipos = ['pildora', 'tratamiento', 'inyeccion'];

    // Si tienes otras variables para la vista, las pones también
    return view('cursos.create', compact('tipos'));
}


    // Guardar nuevo curso en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:250',
            'estado' => 'required|in:activo,completado,archivado',
            'tipo' => 'required|in:inyeccion,pildora,tratamiento',
            'competencias' => 'nullable|string',
            'profesor_id' => 'nullable|exists:users,id',
            'horas_trabajadas' => 'nullable|integer|min:0',
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente');
    }

    // Mostrar detalle de un curso
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    // Mostrar formulario para editar curso
 public function edit(Curso $curso)
{
    $tipos = ['pildora', 'tratamiento', 'inyeccion'];
    return view('cursos.edit', compact('curso', 'tipos'));
}


    // Actualizar curso en base de datos
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:250',
            'estado' => 'required|in:activo,completado,archivado',
            'tipo' => 'required|in:inyeccion,pildora,tratamiento',
            'competencias' => 'nullable|string',
            'profesor_id' => 'nullable|exists:users,id',
            'horas_trabajadas' => 'nullable|integer|min:0',
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente');
    }

    // Eliminar curso
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado correctamente');
    }
}
