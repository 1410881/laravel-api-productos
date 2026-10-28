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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' autoincremental
            $table->string('nombre')->unique(); // Nombre de la categoría (Ej: "Tecnología")
            $table->string('slug')->unique(); // Para URLs amigables (Ej: "tecnologia")
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->timestamps(); // Crea 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
