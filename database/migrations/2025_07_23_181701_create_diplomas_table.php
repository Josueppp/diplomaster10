<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('diplomas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('alumno_curso_id')->constrained('alumno_cursos')->onDelete('cascade');
        $table->string('codigo_unico', 20)->unique();
        $table->timestamp('fecha_emision')->useCurrent();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomas');
    }
};
