<?php

namespace Database\Seeders;

use App\Models\Carta; // Importa el modelo Carta
use App\Models\Evento; // Importa el modelo Evento
use App\Models\EventoUser; // Importa el modelo EventoUser
use App\Models\Partida; // Importa el modelo Partida
use App\Models\User; // Importa el modelo User
use Illuminate\Database\Seeder; // Importa la clase Seeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Partida::factory(10)->create(); // Crea 10 registros de Partida utilizando el factory y los guarda en la base de datos
        User::factory(10)->create(); // Crea 10 registros de User utilizando el factory y los guarda en la base de datos
        Carta::factory(10)->create(); // Crea 10 registros de Carta utilizando el factory y los guarda en la base de datos
        Evento::factory(10)->create(); // Crea 10 registros de Evento utilizando el factory y los guarda en la base de datos
        EventoUser::factory(10)->create(); // Crea 10 registros de EventoUser utilizando el factory y los guarda en la base de datos
    }
}
