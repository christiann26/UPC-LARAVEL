<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Member;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $cartas = Carta::pluck('photo');
        $miembros = Member::all();

        return view('welcome', compact('cartas', 'miembros'));
    }
}
