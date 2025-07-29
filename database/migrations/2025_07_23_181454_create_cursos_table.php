<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion', 250)->nullable();
            $table->enum('estado', ['activo', 'completado', 'archivado'])->default('activo');
            $table->enum('tipo', ['inyeccion', 'pildora', 'tratamiento']);
            $table->text('competencias')->nullable();

            // Columna para relación con profesor (usuario)
            $table->unsignedBigInteger('profesor_id');

            // Llave foránea hacia tabla users
            $table->foreign('profesor_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('horas_trabajadas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
