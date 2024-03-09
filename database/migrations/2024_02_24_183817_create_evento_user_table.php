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
        Schema::create('evento_user', function (Blueprint $table) {
            $table->id(); // Crea una columna de tipo 'id'
            $table->unsignedBigInteger('evento_id'); // Crea una columna de tipo 'unsignedBigInteger' llamada 'evento_id' para almacenar el ID del evento
            $table->unsignedBigInteger('user_id'); // Crea una columna de tipo 'unsignedBigInteger' llamada 'user_id' para almacenar el ID del usuario
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización

            // Define las restricciones de clave externa para las columnas 'evento_id' y 'user_id' que hacen referencia a las tablas 'eventos' y 'users', respectivamente, con eliminación en cascada
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_user');
    }
};
