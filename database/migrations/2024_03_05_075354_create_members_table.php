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
        Schema::create('members', function (Blueprint $table) {
            $table->id(); // Crea una columna de tipo 'id'
            $table->string('name'); // Crea una columna de tipo 'string' llamada 'name' para el nombre del miembro del equipo
            $table->string('role'); // Crea una columna de tipo 'string' llamada 'role' para el role que tiene el miembro del equipo
            $table->string('desc'); // Crea una columna de tipo 'string' llamada 'desc' para la descripción del miembro del equipo
            $table->string('photo'); // Crea una columna de tipo 'string' llamada 'photo' para la foto del miembro
            $table->string('website'); // Crea una columna de tipo 'string' llamada 'website' para la web que tiene el miembro
            $table->string('email'); // Crea una columna de tipo 'string' llamada 'email' para el email del miembro
            $table->string('linkedin'); // Crea una columna de tipo 'string' llamada 'linkedin' para el linkedin del miembro
            $table->string('dribbble'); // Crea una columna de tipo 'string' llamada 'dribble' para el dribbble del miembro
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el control de fecha y hora de creación y actualización
            $table->softDeletes(); // Crea una columna 'deleted_at' para el soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
