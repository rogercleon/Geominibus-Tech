<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_ruta',
        'id_minibus',
        'Fecha',
        'Hora',
    ];

    public function boletos()
    {
        return $this->hasMany(Boleto::class, 'id_horario');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }
    public function asignarMinibus()
    {
        return $this->belongsTo(AsignarMinibuse::class, 'id_minibus');
    }

    public function encomiendas()
    {
        return $this->hasMany(Encomienda::class, 'id_horario');
    }
}
