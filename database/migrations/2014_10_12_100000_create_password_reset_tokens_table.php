<?php

use Illuminate\Database\Migrations\Migration; // Importa la clase Migration
use Illuminate\Database\Schema\Blueprint; // Importa la clase Blueprint
use Illuminate\Support\Facades\Schema; // Importa la clase Schema

return new class extends Migration // Devuelve una instancia anónima de una migración
{
    /**
     * Run the migrations.
     */
    public function up(): void // Método para ejecutar la migración
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) { // Crea la tabla 'password_reset_tokens'
            $table->string('email')->primary(); // Crea una columna de tipo 'string' llamada 'email' y la establece como clave primaria
            $table->string('token'); // Crea una columna de tipo 'string' llamada 'token'
            $table->timestamp('created_at')->nullable(); // Crea una columna de tipo 'timestamp' llamada 'created_at', que puede ser nula
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Método para revertir la migración
    {
        Schema::dropIfExists('password_reset_tokens'); // Elimina la tabla 'password_reset_tokens'
    }
};
