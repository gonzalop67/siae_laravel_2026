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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            // Campos propios
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('titulo', 8)->nullable();
            $table->string('titulo_descripcion', 96)->nullable();
            $table->string('apellido_paterno', 20);
            $table->string('apellido_materno', 20);
            $table->string('nombres', 32);
            $table->string('nombre_corto', 45);
            $table->string('nombre_completo', 64);
            $table->string('cedula', 20);
            $table->date('fecha_nacimiento');
            $table->string('profesion', 50)->nullable();
            $table->string('direccion', 150);
            $table->string('celular', 20);
            $table->string('genero', 1);
            $table->boolean('activo')->default(1);
            $table->timestamps();
            // Definición de collation
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
