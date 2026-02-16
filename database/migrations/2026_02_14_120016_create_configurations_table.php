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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 64);
            $table->string('direccion', 45);
            $table->string('telefono', 45);
            $table->string('nombre_rector', 45);
            $table->string('genero_rector', 1);
            $table->string('nombre_vicerrector', 45);
            $table->string('genero_vicerrector', 1);
            $table->string('nombre_secretario', 45);
            $table->string('genero_secretario', 1);
            $table->string('url', 64);
            $table->string('logo', 64);
            $table->string('email', 64);
            $table->string('amie', 16);
            $table->string('ciudad', 32);
            $table->boolean('copiar_y_pegar')->default(true);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
