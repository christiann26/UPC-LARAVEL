<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::create([
            'name' => 'Jordi Gomez',
            'role' => 'Game Developer',
            'desc' => 'Reconocido diseñador de videojuegos conocido por su habilidad para crear experiencias inmersivas y emocionantes.',
            'photo' => 'avatar1sf.webp',
            'website' => 'https://www.google.es/',
            'email' => 'jordi@gmail.com',
            'linkedin' => 'https://www.linkedin.com/home',
            'dribbble' => 'https://dribbble.com/',
        ]);
        Member::create([
            'name' => 'Miguel Martinez',
            'role' => 'Game Developer',
            'desc' => 'Diseñador de videojuegos que destaca por su capacidad para desarrollar mecánicas de juego.',
            'photo' => 'avatar2sf.webp',
            'website' => 'https://www.google.es/',
            'email' => 'miguel@gmail.com',
            'linkedin' => 'https://www.linkedin.com/home',
            'dribbble' => 'https://dribbble.com/',
        ]);
        Member::create([

            'name' => 'Ivan Pascuas',
            'role' => 'Game Developer',
            'desc' => 'Su habilidad para fusionar elementos visuales proporciona a los jugadores una experiencia inmersiva única.',
            'photo' => 'avatar3sf.webp',
            'website' => 'https://www.google.es/',
            'email' => 'ivan@gmail.com',
            'linkedin' => 'https://www.linkedin.com/home',
            'dribbble' => 'https://dribbble.com/',
        ]);
        Member::create([
            'name' => 'Luis Ledesma',
            'role' => 'Web Developer',
            'desc' => 'El mejor programador de este siglo, es el faker de la programación',
            'photo' => 'luisen.webp',
            'website' => 'https://www.google.es/',
            'email' => 'luis@gmail.com',
            'linkedin' => 'https://www.linkedin.com/home',
            'dribbble' => 'https://dribbble.com/',
        ]);
        Member::create([
            'name' => 'Julian Ortega',
            'role' => 'Web Developer',
            'desc' => 'Apasionado por el desarrollo web y la innovación.',
            'photo' => 'julian.webp',
            'website' => 'https://www.google.es/',
            'email' => 'julian@gmail.com',
            'linkedin' => 'https://www.linkedin.com/home',
            'dribbble' => 'https://dribbble.com/',
        ]);
        Member::create([
            'name' => 'Christian Sastre',
            'role' => 'Web Developer',
            'desc' => 'Hábil desarrollador web con una pasión por crear experiencias digitales innovadoras. Record 0-10',
            'photo' => 'calvo.webp',
            'website' => 'https://www.google.es/',
            'email' => 'christian@gmail.com',
            'linkedin' => 'https://www.linkedin.com/home',
            'dribbble' => 'https://dribbble.com/',
        ]);
        Member::create([
            'name' => 'Pau Lopez',
            'role' => 'Web Developer',
            'desc' => 'Su talento y su forma de programar son inigualables',
            'photo' => 'pau.webp',
            'website' => 'https://www.google.es/',
            'email' => 'pau@gmail.com',
            'linkedin' => 'https://www.linkedin.com/home',
            'dribbble' => 'https://dribbble.com/',
        ]);
    }
}
