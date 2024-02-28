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
        Schema::create('personal_access_tokens', function (Blueprint $table) { // Crea la tabla 'personal_access_tokens'
            $table->id(); // Crea una columna de tipo 'id'
            $table->morphs('tokenable'); // Crea columnas para el tipo y el id del modelo al que pertenece el token
            $table->string('name'); // Crea una columna de tipo 'string' llamada 'name'
            $table->string('token', 64)->unique(); // Crea una columna de tipo 'string' llamada 'token' con longitud 64 y la establece como única
            $table->text('abilities')->nullable(); // Crea una columna de tipo 'text' llamada 'abilities' que puede ser nula
            $table->timestamp('last_used_at')->nullable(); // Crea una columna de tipo 'timestamp' llamada 'last_used_at' que puede ser nula
            $table->timestamp('expires_at')->nullable(); // Crea una columna de tipo 'timestamp' llamada 'expires_at' que puede ser nula
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Método para revertir la migración
    {
        Schema::dropIfExists('personal_access_tokens'); // Elimina la tabla 'personal_access_tokens'
    }
};
