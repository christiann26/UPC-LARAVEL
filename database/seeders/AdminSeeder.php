<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ByLuisen32',
            'email' => 'luisenric32@gmail.com',
            'email_verified_at' => now(),
            'password' => 'admin',
            'partidas_jugadas' => 0,
            'partidas_ganadas' => 0,
            'partidas_empatadas' => 0,
            'partidas_perdidas' => 0,
            'remember_token' => Str::random(10),
        ])->assignRole('admin');
    }
}
