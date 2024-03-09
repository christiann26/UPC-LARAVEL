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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id(); // Crea una columna de tipo 'id'
            $table->unsignedBigInteger('user_id');
            $table->string('nombre'); // Crea una columna de tipo 'string' llamada 'nombre' para el nombre del evento
            $table->string('tipo'); // Crea una columna de tipo 'string' llamada 'tipo' para el tipo de evento
            $table->integer('numero_participantes')->nullable()->default(1); // Crea una columna de tipo 'integer' llamada 'numero_participantes' para el número de participantes, la hace nullable y establece un valor por defecto de 1
            $table->string('fecha_inicio'); // Crea una columna de tipo 'string' llamada 'fecha_inicio' para la fecha de inicio del evento
            $table->string('duracion'); // Crea una columna de tipo 'string' llamada 'duracion' para la duración del evento
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización
            $table->softDeletes(); // Crea una columna 'deleted_at' para el soft delete

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Método para revertir la migración
    {
        Schema::dropIfExists('eventos'); // Elimina la tabla 'eventos'
    }
};
