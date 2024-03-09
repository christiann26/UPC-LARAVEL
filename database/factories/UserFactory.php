<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $partidas_jugadas = $this->faker->numberBetween(50, 200);
        $partidas_ganadas = $this->faker->numberBetween(0, $partidas_jugadas);
        $partidas_perdidas = $this->faker->numberBetween(0, $partidas_jugadas - $partidas_ganadas);
        $partidas_empatadas = $partidas_jugadas - $partidas_ganadas - $partidas_perdidas;

        $userName = fake()->userName();
        
        return [
            'name' => $userName,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => $userName,
            'partidas_jugadas' => $partidas_jugadas,
            'partidas_ganadas' => $partidas_ganadas,
            'partidas_empatadas' => $partidas_empatadas,
            'partidas_perdidas' => $partidas_perdidas,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
