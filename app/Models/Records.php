<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $fillable = [
        'type', 'date', 'ip', 'user_id'
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    const IN = 'I'; //Inicio do Ponto
    const OUT = 'O'; //Encerramento do Ponto
    const ININTERVAL = 'II'; //Inicio do Intervalo
    const OUTINTERVAL = 'OI'; //Fim do Intervalo
}
