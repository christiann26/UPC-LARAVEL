<?php

use Illuminate\Database\Migrations\Migration; // Importa la clase Migration
use Illuminate\Database\Schema\Blueprint; // Importa la clase Blueprint
use Illuminate\Support\Facades\Schema; // Importa la clase Schema

return new class extends Migration // Devuelve una instancia anónima de una migración
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void // Método para ejecutar la migración
    {
        Schema::create('password_resets', function (Blueprint $table) { // Crea la tabla 'password_resets'
            $table->string('email')->index(); // Crea una columna de tipo 'string' llamada 'email' y crea un índice para ella
            $table->string('token'); // Crea una columna de tipo 'string' llamada 'token'
            $table->timestamp('created_at')->nullable(); // Crea una columna de tipo 'timestamp' llamada 'created_at', que puede ser nula
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void // Método para revertir la migración
    {
        Schema::dropIfExists('password_resets'); // Elimina la tabla 'password_resets'
    }
};
