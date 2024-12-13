<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_horario',
        'id_cliente',
        'Asiento',
        'Precio',
    ];

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

}
