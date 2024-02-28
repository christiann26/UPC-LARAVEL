<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PartidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuario1 = User::factory()->create();

        do {
            $usuario2 = User::factory()->create();
        } while ($usuario2->id === $usuario1->id); // Asegura que los IDs sean diferentes

        return [
            'nombre' => $this->faker->unique()->name,
            'hora_partida' => $this->faker->date(),
            'usuario1_id' => $usuario1->id,
            'usuario2_id' => $usuario2->id
        ];
    }
}
