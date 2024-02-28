<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  \App\Models\User;


class Partida extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'hora_partida', 'id_jugador1', 'id_jugador2',
    ];

    public function usuario1()
    {
        return $this->belongsTo(User::class, 'usuario1_id');
    }

    public function usuario2()
    {
        return $this->belongsTo(User::class, 'usuario2_id');
    }
}
