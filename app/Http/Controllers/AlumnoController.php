<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    // Mostrar listado de alumnos
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    // Mostrar formulario para crear nuevo alumno
    public function create()
    {
        return view('alumnos.create');
    }

    // Guardar nuevo alumno en la base de datos
   public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:alumnos,email',
        'telefono' => 'nullable|string|max:20', // Validación para teléfono (puede ser null)
    ]);

    Alumno::create($request->only('nombre', 'email', 'telefono'));

    return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente');
}



    // Mostrar detalle de un alumno
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    // Mostrar formulario para editar alumno
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    // Actualizar alumno en base de datos
public function update(Request $request, Alumno $alumno)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:alumnos,email,'.$alumno->id,
        'telefono' => 'nullable|string|max:20',
    ]);

    $alumno->update($request->only('nombre', 'email', 'telefono'));

    return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente');
}

    // Eliminar alumno
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente');
    }
}
