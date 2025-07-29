<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\AlumnoCurso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class DiplomaController extends Controller
{
    // Mostrar listado de diplomas
    public function index()
    {
        $diplomas = Diploma::with('alumnoCurso')->get();
        return view('diplomas.index', compact('diplomas'));
    }

    // Mostrar formulario para crear nuevo diploma

public function create()
{
    $alumnoCursos = AlumnoCurso::with(['alumno', 'curso'])->get();

    return view('diplomas.create', compact('alumnoCursos'));
}


    // Guardar nuevo diploma en base de datos
    public function store(Request $request)
    {
        $request->validate([
    'alumno_curso_id' => ['required', 'exists:alumno_cursos,id'],
    'codigo_unico' => ['required', 'string', Rule::unique('diplomas')],
    'fecha_emision' => ['required', 'date'],
]);


        Diploma::create($request->all());

        return redirect()->route('diplomas.index')->with('success', 'Diploma creado correctamente');
    }

    // Mostrar detalle de diploma
    public function show(Diploma $diploma)
    {
        $diploma->load('alumnoCurso.alumno', 'alumnoCurso.curso');
        return view('diplomas.show', compact('diploma'));
    }

    // Mostrar formulario para editar diploma
    public function edit(Diploma $diploma)
    {
        $inscripciones = AlumnoCurso::with(['alumno', 'curso'])->get();
        return view('diplomas.edit', compact('diploma', 'inscripciones'));
    }

    // Actualizar diploma en base de datos
    public function update(Request $request, Diploma $diploma)
    {
     $request->validate([
    'alumno_curso_id' => ['required', 'exists:alumnos_cursos,id'],
    'codigo_unico' => ['required', 'string', Rule::unique('diplomas')->ignore($diploma->id)],
    'fecha_emision' => ['required', 'date'],
]);

        $diploma->update($request->all());

        return redirect()->route('diplomas.index')->with('success', 'Diploma actualizado correctamente');
    }

    // Eliminar diploma
    public function destroy(Diploma $diploma)
    {
        $diploma->delete();
        return redirect()->route('diplomas.index')->with('success', 'Diploma eliminado correctamente');
    }


     public function enviar($id)
    {
        require_once base_path('vendor/setasign/fpdf/fpdf.php');

        
    $diploma = Diploma::with('alumnoCurso.alumno', 'alumnoCurso.curso')->findOrFail($id);
    $alumno = $diploma->alumnoCurso->alumno;
    $curso = $diploma->alumnoCurso->curso;

    $pdf = new Fpdi();
    $pdf->AddPage('P', 'Letter'); // Vertical, tamaño carta
    $pdf->setSourceFile(public_path('formatodiploma.pdf'));
    $template = $pdf->importPage(1);
    $pdf->useTemplate($template);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(0, 0, 0);

    // Coordenadas ajustadas
    $pdf->SetXY(10, 130);
    $pdf->Cell(0, 10, utf8_decode("Se otorga a: {$alumno->nombre}"), 0, 1, 'C');

    $pdf->SetXY(10, 145);
    $pdf->Cell(0, 10, utf8_decode("Por haber completado el curso: {$curso->nombre}"), 0, 1, 'C');

    $pdf->SetXY(10, 160);
    $pdf->Cell(0, 10, utf8_decode("Fecha de emisión: " . \Carbon\Carbon::parse($diploma->fecha_emision)->format('d/m/Y')), 0, 1, 'C');

    $pdf->SetXY(10, 175);
    $pdf->Cell(0, 10, utf8_decode("Código Único: {$diploma->codigo_unico}"), 0, 1, 'C');

    $pdf->Output('I', 'diploma.pdf');
    exit;
    }

}