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
        Schema::create('usuario_partida', function (Blueprint $table) { // Crea la tabla 'usuario_partida'
            $table->id(); // Crea una columna de tipo 'id'
            $table->unsignedBigInteger('usuario_id'); // Crea una columna de tipo 'unsignedBigInteger' llamada 'usuario_id' para almacenar el ID del usuario
            $table->unsignedBigInteger('partida_id'); // Crea una columna de tipo 'unsignedBigInteger' llamada 'partida_id' para almacenar el ID de la partida
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización
            $table->softDeletes(); // Crea una columna 'deleted_at' para el soft delete

            // Define las restricciones de clave externa para las columnas 'usuario_id' y 'partida_id' que hacen referencia a las tablas 'users' y 'partidas', respectivamente, con eliminación en cascada
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partida_id')->references('id')->on('partidas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_partida');
    }
};
