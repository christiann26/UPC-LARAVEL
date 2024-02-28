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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id(); // Crea una columna de tipo 'id'
            $table->string('nombre'); // Crea una columna de tipo 'string' llamada 'nombre'
            $table->date('hora_partida'); // Crea una columna de tipo 'date' llamada 'hora_partida'
            $table->unsignedBigInteger('usuario1_id'); // Crea una columna de tipo 'unsignedBigInteger' llamada 'usuario1_id' para almacenar el ID del primer usuario
            $table->unsignedBigInteger('usuario2_id'); // Crea una columna de tipo 'unsignedBigInteger' llamada 'usuario2_id' para almacenar el ID del segundo usuario
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización
            $table->softDeletes(); // Crea una columna 'deleted_at' para el soft delete

            // Define las restricciones de clave externa para las columnas 'usuario1_id' y 'usuario2_id' que hacen referencia a la tabla 'users' en la columna 'id', con eliminación en cascada
            $table->foreign('usuario1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario2_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
