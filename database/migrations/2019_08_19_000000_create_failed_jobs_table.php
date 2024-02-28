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
        Schema::create('failed_jobs', function (Blueprint $table) { // Crea la tabla 'failed_jobs'
            $table->id(); // Crea una columna de tipo 'id'
            $table->string('uuid')->unique(); // Crea una columna de tipo 'string' llamada 'uuid' y la establece como única
            $table->text('connection'); // Crea una columna de tipo 'text' llamada 'connection'
            $table->text('queue'); // Crea una columna de tipo 'text' llamada 'queue'
            $table->longText('payload'); // Crea una columna de tipo 'longText' llamada 'payload'
            $table->longText('exception'); // Crea una columna de tipo 'longText' llamada 'exception'
            $table->timestamp('failed_at')->useCurrent(); // Crea una columna de tipo 'timestamp' llamada 'failed_at' y utiliza la fecha y hora actual como valor por defecto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Método para revertir la migración
    {
        Schema::dropIfExists('failed_jobs'); // Elimina la tabla 'failed_jobs'
    }
};
