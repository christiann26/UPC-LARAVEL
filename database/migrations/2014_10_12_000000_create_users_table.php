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
        Schema::create('users', function (Blueprint $table) { // Crea la tabla 'users'
            $table->id(); // Crea una columna de tipo 'id'
            $table->string('name'); // Crea una columna de tipo 'string' llamada 'name'
            $table->string('email')->unique(); // Crea una columna de tipo 'string' llamada 'email' y única
            $table->timestamp('email_verified_at')->nullable(); // Crea una columna de tipo 'timestamp' llamada 'email_verified_at', que puede ser nula
            $table->string('password'); // Crea una columna de tipo 'string' llamada 'password'
            $table->string('partidas_jugadas')->default('0'); // Crea una columna de tipo 'string' llamada 'partidas_jugadas', que por defecto es 0
            $table->string('partidas_ganadas')->default('0'); // Crea una columna de tipo 'string' llamada 'partidas_ganadas', que por defecto es 0
            $table->string('partidas_empatadas')->default('0'); // Crea una columna de tipo 'string' llamada 'partidas_empatadas', que por defecto es 0
            $table->string('partidas_perdidas')->default('0'); // Crea una columna de tipo 'string' llamada 'partidas_perdidas', que por defecto es 0
            $table->rememberToken(); // Crea una columna para el token de recordar sesión
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización
            $table->softDeletes(); // Crea una columna 'deleted_at' para el soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Método para revertir la migración
    {
        Schema::dropIfExists('users'); // Elimina la tabla 'users'
    }
};
