<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fecha_inicio = $this->faker->dateTimeBetween('+1 day', '+1 month')->format('d/m/Y H:i');

        return [
            'user_id' => User::all()->random()->id,
            'nombre' => $this->faker->name,
            'tipo' => $this->faker->randomElement(['Torneo', 'Dibujo']),
            'numero_participantes' => $this->faker->numberBetween(1, 999),
            'fecha_inicio' => $fecha_inicio,
            'duracion' => $this->faker->randomElement(['00:30', '01:00','01:30']),
        ];
    }
}
