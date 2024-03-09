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
        Schema::create('cartas', function (Blueprint $table) {
            $table->id(); // Crea una columna de tipo 'id'
            $table->string('photo'); // Crea una columna de tipo 'string' llamada 'photo'
            $table->string('nombre'); // Crea una columna de tipo 'string' llamada 'nombre'
            $table->string('role'); // Crea una columna de tipo 'string' llamada 'rol'
            $table->integer('coste_elixir'); // Crea una columna de tipo 'integer' llamada 'coste_elixir'
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización
            $table->softDeletes(); // Crea una columna 'deleted_at' para el soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartas');
    }
};
